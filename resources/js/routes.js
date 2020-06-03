import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Login from './components/auth/Login.vue';
import TeamIndex from './components/teams/TeamIndex.vue';
import TeamCreate from './components/teams/TeamCreate.vue';
import TeamEdit from './components/teams/TeamEdit.vue';
import TeamShow from './components/teams/TeamShow.vue';
import PlayerCreate from './components/players/PlayerCreate.vue';
import PlayerEdit from './components/players/PlayerEdit.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'home'
  },
  {
    path: '/login',
    component: Login,
    name: 'login'
  },
  {
    path: '/teams',
    component: TeamIndex,
    name: 'teams',
    meta: { requiresAuth: true }
  },
  {
    path: '/teams/create',
    component: TeamCreate,
    name: 'createTeam',
    meta: { requiresAuth: true }
  },
  {
    path: '/teams/:id/edit',
    component: TeamEdit,
    name: 'editTeam',
    meta: { requiresAuth: true }
  },
  {
    path: '/teams/:id',
    component: TeamShow,
    name: 'showTeam',
    meta: { requiresAuth: true }
  },
  {
    path: '/teams/:teamId/players/create',
    component: PlayerCreate,
    name: 'createPlayer',
    meta: { requiresAuth: true }
  },
  {
    path: '/teams/:teamId/players/:id/edit',
    component: PlayerEdit,
    name: 'editPlayer',
    meta: { requiresAuth: true }
  },
];

const router = new VueRouter({
  routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!auth.check()) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      });

      return;
    }
  }

  next();
})


export default router;