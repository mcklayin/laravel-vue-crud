import {
  SET_PLAYERS,
} from './types';

export default {
  [SET_PLAYERS](state, data) {
    state.players = data;
  },
};