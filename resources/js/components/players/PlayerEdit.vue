<template>
    <div v-show="loaded">
        <div class="form-group">
            <button
                    type="button"
                    @click="$router.go(-1)" class="btn btn-primary">&laquo;
                Back
            </button>
        </div>

        <div class="card">
            <div class="card-header">Edit Player</div>
            <div class="card-body">
                <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                <form @submit.prevent="saveForm()">
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
                            <button class="btn btn-success">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
  import ValidationErrors from '../ValidationErrors.vue';
  import { mapGetters } from 'vuex';
  import {
    FETCH_PLAYER,
    CHANGE_PLAYER
  } from '../../store/player/types';
  import {
    UPDATE_PLAYER_IN_PLAYERS,
  } from '../../store/players/types';
  export default {
    data() {
      return {
        loaded: false,
        validationErrors: false
      }
    },
    components: {
      ValidationErrors
    },
    async mounted() {
      let id = this.$route.params.id;
      await this.$store.dispatch(FETCH_PLAYER, { id });
      this.loaded = true;
    },
    computed: {
      ...mapGetters({
        player: FETCH_PLAYER,
      })
    },

    methods: {
      async saveForm() {
        const data = await this.$store.dispatch(CHANGE_PLAYER, { id: this.$route.params.id, player: this.player });
        if (data && data.hasOwnProperty('err')){
          this.validationErrors = data.err.data.errors;
        } else {
          this.$store.dispatch(UPDATE_PLAYER_IN_PLAYERS, data);
          this.$router.push({ name: 'showTeam', params: { id: this.player.team_id }  });
        }
      }
    }
  }
</script>