<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <router-link to="/" class="btn btn-primary">Back</router-link>
            </div>

            <div class="card">
                <div class="card-header">Create new Team</div>
                <div class="card-body">
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
  import {
    NEW_TEAM
  } from '../../store/team/types';
  export default {
    data() {
      return {
        team: this.$store.state.team
      };
    },
    methods: {
      async saveForm () {
        const data = await this.$store.dispatch(NEW_TEAM, { team: this.team });
        // todo some alert
        if (data) {
          this.$router.push({ name: 'teams' });
        }
      }
    }
  }
</script>