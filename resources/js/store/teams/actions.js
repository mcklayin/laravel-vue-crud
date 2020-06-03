import {
  SET_TEAMS,
  FETCH_TEAMS,
} from './types';
import * as API from '../../consts/api';


export default {
  async [FETCH_TEAMS] ({ commit, dispatch }) {
    try {
      const { data } = await api.call('get', `${API.GET_TEAMS}`);

      if (data) {
        commit(SET_TEAMS, data);

        return data;
      }
    } catch (e) {
      console.log(e);
    }
  },
};