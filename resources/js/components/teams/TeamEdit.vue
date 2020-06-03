<template>
    <div v-show="loaded">
        <div class="form-group">
            <router-link to="/" class="btn btn-primary">Back</router-link>
        </div>

        <div class="card">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
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
  import ValidationErrors from '../ValidationErrors.vue';
  import {
    FETCH_TEAM,
    CHANGE_TEAM
  } from '../../store/team/types';
  import {
    UPDATE_TEAM_IN_TEAMS
  } from '../../store/teams/types';
  export default {
    components: {
      ValidationErrors
    },
    data() {
      return {
        loaded: false,
        validationErrors: false
      };
    },
    async created() {
      let id = this.$route.params.id;
      await this.$store.dispatch(FETCH_TEAM, { id });
      this.loaded = true;
    },
    computed: {
      ...mapGetters({
        team: FETCH_TEAM,
      })
    },

    methods: {
      async saveForm() {
        const data = await this.$store.dispatch(CHANGE_TEAM, { id: this.$route.params.id, team: this.team });
        if (data && data.hasOwnProperty('err')){
          this.validationErrors = data.err.data.errors;
        } else {
          this.$store.dispatch(UPDATE_TEAM_IN_TEAMS, data);
          this.$router.push({ name: 'teams' });
        }
      }
    }
  }
</script>