<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Back</router-link>
        </div>

        <div class="card">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <form @submit.prevent="saveForm()">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Team name</label>
                                <input type="text" v-model="team.name" class="form-control">
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
    FETCH_TEAM,
    CHANGE_TEAM
  } from '../../store/team/types';
  export default {
    created() {
      let id = this.$route.params.id;
      this.$store.dispatch(FETCH_TEAM, { id });
    },
    computed: {
      ...mapGetters({
        team: FETCH_TEAM,
      })
    },

    methods: {
      async saveForm() {
        const data = await this.$store.dispatch(CHANGE_TEAM, { id: this.$route.params.id, team: this.team });
        // todo do some alert
        if (data) {
          this.$router.push({ name: 'teams' });
        }
      }
    }
  }
</script>