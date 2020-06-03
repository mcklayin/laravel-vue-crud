import mutations from './mutations';
import getters from './getters';
import actions from './actions';
export default {
  state: {
    player: {
      first_name: '',
      last_name: '',
      team_id: null
    }
  },
  mutations,
  getters,
  actions,
};