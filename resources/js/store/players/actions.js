import {
  SET_PLAYERS,
  FETCH_PLAYERS,
} from './types';
import * as API from '../../consts/api';


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
};