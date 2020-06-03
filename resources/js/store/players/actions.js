import {
  SET_PLAYERS,
  FETCH_PLAYERS,
} from './types';
import * as API from '../../consts/api';
import { ADD_TO_PLAYERS, UPDATE_PLAYER_IN_PLAYERS } from '../players/types'


export default {
  async [FETCH_PLAYERS] ({ commit, dispatch }) {
    try {
      const { data } = await api.call('get', `${API.GET_PLAYERS}`);

      if (data) {
        commit(SET_PLAYERS, data);
      }
    } catch (e) {
      console.log(e);
    }
  },

  [ADD_TO_PLAYERS]({ dispatch, commit }, value) {
    try {
      commit(ADD_TO_PLAYERS, value);
    } catch (err) {
      console.log(err);
    }
  },

  [UPDATE_PLAYER_IN_PLAYERS]({ dispatch, commit }, value) {
    try {
      commit(UPDATE_PLAYER_IN_PLAYERS, value);
    } catch (err) {
      console.log(err);
    }
  },
};