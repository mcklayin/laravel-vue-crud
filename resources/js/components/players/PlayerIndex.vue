<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createPlayer', params: { teamId }}" class="btn btn-success">Add Player</router-link>
        </div>

        <div class="card">
            <div class="card-header">Players list</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Created Date</th>
                        <th width="170">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="player, index in players">
                        <td>{{ player.first_name }}</td>
                        <td>{{ player.last_name }}</td>
                        <td>{{ player.created_at }}</td>
                        <td>
                            <router-link :to="{name: 'editPlayer', params: {id: player.id, teamId }}" class="btn btn-xs btn-primary">
                                Edit
                            </router-link>
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
    FETCH_PLAYERS,
  } from '../../store/players/types';
  export default {
    props: {
      teamId: Number
    },
    computed: {
      ...mapGetters({
        players: FETCH_PLAYERS,
      }),
    },
    methods: {
    }
  }
</script>