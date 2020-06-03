<template>
    <div v-show="loaded">
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Back</router-link>
        </div>

        <div class="card">
            <div class="card-header">Edit {{ player.first_name }}</div>
            <div class="card-body">
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
  import { mapGetters } from 'vuex';
  import {
    FETCH_PLAYER,
    CHANGE_PLAYER
  } from '../../store/player/types';
  export default {
    data() {
      return {
        loaded: false
      }
    },
    async created() {
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
        // todo do some alert
        if (data) {
          this.$router.push({ name: 'showTeam', params: { id: this.player.team_id } });
        }
      }
    }
  }
</script>