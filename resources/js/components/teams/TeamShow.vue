<template>
    <div v-show="isLoaded">
        <div class="form-group">
            <button
                    type="button"
                    @click="$router.go(-1)" class="btn btn-primary">&laquo;
                Back
            </button>
        </div>
        <div class="card">
            <div class="card-header">Team {{ team.name }} Players</div>
            <div class="card-body" v-if="team.players">
                <player-index  :teamId="id()"></player-index>
            </div>
        </div>
    </div>
</template>

<script>
  import PlayerIndex from '../players/PlayerIndex.vue';
  import { mapGetters } from 'vuex';
  import {
    FETCH_TEAM_WITH_PLAYERS
  } from '../../store/team/types';
  import {
    SET_PLAYERS
  } from '../../store/players/types';
  export default {
    components: {
      PlayerIndex
    },
    mounted() {
      this.getTeamWithPlayers();
    },
    computed: {
      ...mapGetters({
        team: FETCH_TEAM_WITH_PLAYERS,
      }),
      isLoaded() {
        return this.team && this.team.id === this.id();
      }
    },
    methods: {
      id() {
        return parseInt(this.$route.params.id);
      },
     async getTeamWithPlayers() {
       if (!this.team.players || this.team.id !== this.id()) {
         const data = await this.$store.dispatch(FETCH_TEAM_WITH_PLAYERS, { id: this.id() });

         if (data && data.players) {
           this.$store.commit(SET_PLAYERS, data.players );
         }
       }
      },
    }
  }
</script>