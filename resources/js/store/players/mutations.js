import {
  SET_PLAYERS,
  ADD_TO_PLAYERS,
  UPDATE_PLAYER_IN_PLAYERS
} from './types';

export default {
  [SET_PLAYERS](state, data) {
    state.players = data;
  },

  [ADD_TO_PLAYERS](state, data) {
    state.players.push(data);
  },

  [UPDATE_PLAYER_IN_PLAYERS](state, data) {
    state.players = state.players.map((item) => {
      if (item.id === data.id) {
        item = data;
      }
      return item;
    });
  },
};