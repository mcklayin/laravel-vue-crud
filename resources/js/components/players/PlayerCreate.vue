<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button
                        type="button"
                        @click="$router.go(-1)" class="btn btn-primary">&laquo;
                    Back
                </button>
            </div>

            <div class="card">
                <div class="card-header">Add Player</div>
                <div class="card-body">
                    <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                    <form v-on:submit="saveForm()">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Player first name</label>
                                <input type="text" v-model="player.first_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Player last name</label>
                                <input type="text" v-model="player.last_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import ValidationErrors from '../ValidationErrors.vue';
  import {
    NEW_PLAYER,
  } from '../../store/player/types';
  import {
    ADD_TO_PLAYERS,
  } from '../../store/players/types';
  export default {
    data() {
      return {
        player: {
          first_name: '',
          last_name: ''
        },
        validationErrors: false
      };
    },
    components: {
      ValidationErrors
    },
    computed: {},
    methods: {
      teamId() {
        return this.$route.params.teamId;
      },
      async saveForm () {
        this.player.team_id = this.teamId();
        const data = await this.$store.dispatch(NEW_PLAYER, { player: this.player });
        if (data && data.hasOwnProperty('err')){
          this.validationErrors = data.err.data.errors;
        } else {
          this.$store.dispatch(ADD_TO_PLAYERS, data);
          this.$router.push({ name: 'showTeam', params: { id: this.player.team_id }  });
        }
      }
    }
  }
</script>