import {
  SET_TEAMS,
  FETCH_TEAMS,
  ADD_TO_TEAMS,
  UPDATE_TEAM_IN_TEAMS
} from './types';
import * as API from '../../consts/api';


export default {
  async [FETCH_TEAMS] ({ commit, dispatch }) {
    try {
      const { data: { data } } = await api.call('get', `${API.GET_TEAMS}`);

      if (data) {
        commit(SET_TEAMS, data);

        return data;
      }
    } catch (e) {
      console.log(e);
    }
  },

  [ADD_TO_TEAMS]({ dispatch, commit }, value) {
    try {
      commit(ADD_TO_TEAMS, value);
    } catch (err) {
      console.log(err);
    }
  },

  [UPDATE_TEAM_IN_TEAMS]({ dispatch, commit }, value) {
    try {
      commit(UPDATE_TEAM_IN_TEAMS, value);
    } catch (err) {
      console.log(err);
    }
  },
};