// Server API

// Authentication
export const LOGIN = '/login';
export const LOGOUT = '/logout';

// Teams
export const GET_TEAMS = '/teams';
export const GET_TEAM = teamId => `/teams/${teamId}`;
export const GET_TEAM_WITH_PLAYERS = teamId => `/teams/${teamId}/players`;
export const CREATE_TEAM = `/teams`;
export const UPDATE_TEAM = teamId => `/teams/${teamId}`;
export const DELETE_TEAM = teamId => `/teams/${teamId}`;


// Players
export const GET_PLAYERS = `/players`;
export const GET_PLAYER = playerId => `/players/${playerId}`;
export const CREATE_PLAYER = `/players`;
export const UPDATE_PLAYER = playerId => `/players/${playerId}`;
