<template>
    <div v-show="loaded">
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
    data() {
      return {
        loaded: false
      };
    },
    created() {
      this.getTeamWithPlayers();
      this.loaded = true;
    },
    computed: {
      ...mapGetters({
        team: FETCH_TEAM_WITH_PLAYERS,
      }),
    },
    methods: {
      id() {
        return parseInt(this.$route.params.id);
      },
     async getTeamWithPlayers() {
       const data = await this.$store.dispatch(FETCH_TEAM_WITH_PLAYERS, { id: this.id() });

       if (data && data.players) {
         this.$store.commit(SET_PLAYERS, data.players );
       }
      },
    }
  }
</script>