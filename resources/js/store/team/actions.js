import {
  FETCH_TEAM,
  FETCH_TEAM_WITH_PLAYERS,
  NEW_TEAM,
  SET_TEAM,
  CHANGE_TEAM,
  REMOVE_TEAM
} from './types';
import * as API from '../../consts/api';


export default {
  async [FETCH_TEAM] ({ commit, dispatch }, { id }) {
    try {
      const { data: { data } } = await api.call('get', `${API.GET_TEAM(id)}`);
      if (data) {
        commit(SET_TEAM, data);

        return data;
      }
    } catch (e) {
      console.log(e);
    }
  },

  async [FETCH_TEAM_WITH_PLAYERS] ({ commit, dispatch }, { id }) {
    try {
      const { data: { data } } = await api.call('get', `${API.GET_TEAM_WITH_PLAYERS(id)}`);
      if (data) {
        commit(SET_TEAM, data);

        return data;
      }
    } catch (e) {
      console.log(e);
    }
  },

  async [NEW_TEAM]({ dispatch, commit, rootState }, { team }) { // eslint-disable-line
    try {
      const { data } = await api.call('post', `${API.CREATE_TEAM}`, team);
      if (data) {
        commit(SET_TEAM, data);
        return data;
      }
    } catch (err) {
      console.log(err);
      return { err };
    }
  },

  async [CHANGE_TEAM]({ dispatch, commit, rootState }, { id, team }) { // eslint-disable-line
    try {
      const { data } = await api.call('put', `${API.UPDATE_TEAM(id)}`, team);
      if (data) {
        commit(SET_TEAM, data);
        return data;
      }
    } catch (err) {
      console.log(err);
      return { err };
    }
  },

  async [REMOVE_TEAM]({ dispatch, commit, rootState }, { id }) { // eslint-disable-line
    try {
      const { data } = await api.call('delete', `${API.DELETE_TEAM(id)}`);
      if (data) {
        commit(SET_TEAM, data);
        return data;
      }
    } catch (err) {
      console.log(err);
      return { err };
    }
  },
};