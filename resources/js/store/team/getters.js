import {
  FETCH_TEAM,
  FETCH_TEAM_WITH_PLAYERS
} from './types';

export default {
  [FETCH_TEAM]: state => state.team,
  [FETCH_TEAM_WITH_PLAYERS]: state => state.team
};