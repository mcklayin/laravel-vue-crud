import {
  SET_PLAYER,
} from './types';

export default {
  [SET_PLAYER](state, data) {
    state.player = data;
  },
};