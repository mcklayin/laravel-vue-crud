import {
  SET_TEAMS,
} from './types';

export default {
  [SET_TEAMS](state, data) {
    state.teams = data;
  },
};