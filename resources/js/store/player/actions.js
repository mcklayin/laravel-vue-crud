import {
  FETCH_PLAYER,
  NEW_PLAYER,
  SET_PLAYER,
  CHANGE_PLAYER,
} from './types';
import * as API from '../../consts/api';


export default {
  async [FETCH_PLAYER] ({ commit, dispatch }, { id }) {
    try {
      const { data: { data } } = await api.call('get', `${API.GET_PLAYER(id)}`);
      if (data) {
        commit(SET_PLAYER, data);
        return data;
      }
    } catch (e) {
      console.log(e);
    }
  },

  async [NEW_PLAYER]({ dispatch, commit, rootState }, { player }) { // eslint-disable-line
    try {
      const { data } = await api.call('post', `${API.CREATE_PLAYER}`, player);
      if (data) {
        commit(SET_PLAYER, data);
        return data;
      }
    } catch (err) {
      console.log(err);
      return { err };
    }
  },

  async [CHANGE_PLAYER]({ dispatch, commit, rootState }, { id, player }) { // eslint-disable-line
    try {
      const { data } = await api.call('put', `${API.UPDATE_PLAYER(id)}`, player);
      if (data) {
        commit(SET_PLAYER, data);
        return data;
      }
    } catch (err) {
      console.log(err);
      return { err };
    }
  }
};