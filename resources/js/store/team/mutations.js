import {
  SET_TEAM,
} from './types';

export default {
  [SET_TEAM](state, data) {
    state.team = data;
  }
};