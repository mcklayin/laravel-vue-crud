<template>
    <div v-show="loaded">
        <div class="form-group">
            <router-link :to="{name: 'createTeam'}" class="btn btn-success">Create new Team</router-link>
        </div>

        <div class="card">
            <div class="card-header">Teams list</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th width="250">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="team, index in teams">
                        <td>{{ team.name }}</td>
                        <td>{{ team.created_at }}</td>
                        <td>
                            <router-link :to="{name: 'showTeam', params: {id: team.id}}" class="btn btn-xs btn-primary">
                                Show
                            </router-link>
                            <router-link :to="{name: 'editTeam', params: {id: team.id}}" class="btn btn-xs btn-primary">
                                Edit
                            </router-link>
                            <!--<a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(team.id, index)">
                                Delete
                            </a> -->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
  import { mapGetters } from 'vuex';
  import {
    FETCH_TEAMS
  } from '../../store/teams/types';
  export default {
    data() {
      return {
        loaded: false
      };
    },
    computed: {
      ...mapGetters({
        teams: FETCH_TEAMS,
      })
    },
    async mounted() {
      if (this.teams.length === 0) {
        await this.$store.dispatch(FETCH_TEAMS);
      }
      this.loaded = true;
    },
    methods: {
      deleteEntry(id, index) {
        if (confirm("Do you really want to delete it?")) {
          // @todo will be later
        }
      }
    }
  }
</script>