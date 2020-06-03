<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <router-link to="/" class="btn btn-primary">Back</router-link>
            </div>

            <div class="card">
                <div class="card-header">Create new Team</div>
                <div class="card-body">
                    <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                    <form v-on:submit="saveForm()">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label">Team name</label>
                                <input type="text" v-model="team.name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Create</button>
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
    NEW_TEAM
  } from '../../store/team/types';
  import {
    ADD_TO_TEAMS
  } from '../../store/teams/types';
  export default {
    components: {
      ValidationErrors
    },
    data() {
      return {
        team: {
          name: ''
        },
        validationErrors: false
      };
    },
    methods: {
      async saveForm () {
        const data = await this.$store.dispatch(NEW_TEAM, { team: this.team });
        if (data && data.hasOwnProperty('err')){
          this.validationErrors = data.err.data.errors;
        } else {
          this.$store.dispatch(ADD_TO_TEAMS, data);
          this.$router.push({ name: 'teams' });
        }
      }
    }
  }
</script>