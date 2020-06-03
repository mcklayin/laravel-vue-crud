<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <router-link to="/" class="btn btn-primary">Back</router-link>
            </div>

            <div class="card">
                <div class="card-header">Add Player</div>
                <div class="card-body">
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
  import { mapGetters } from 'vuex';
  import {
    NEW_PLAYER,
    FETCH_PLAYER
  } from '../../store/player/types';
  export default {
    computed: {
      ...mapGetters({
        player: FETCH_PLAYER,
      })
    },
    methods: {
      teamId() {
        return this.$route.params.teamId;
      },
      async saveForm () {
        this.player.team_id = this.teamId();
        const data = await this.$store.dispatch(NEW_PLAYER, { player: this.player });
        // todo some alert
        if (data) {
          this.$router.push({ name: 'showTeam', params: { id: this.player.team_id }  });
        }
      }
    }
  }
</script>