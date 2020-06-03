import {
  SET_TEAMS,
  ADD_TO_TEAMS,
  UPDATE_TEAM_IN_TEAMS
} from './types';

export default {
  [SET_TEAMS](state, data) {
    state.teams = data;
  },

  [ADD_TO_TEAMS](state, data) {
    state.teams.push(data);
  },

  [UPDATE_TEAM_IN_TEAMS](state, data) {
    state.teams = state.teams.map((item) => {
      if (item.id === data.id) {
        item = data;
      }
      return item;
    });
  },
};