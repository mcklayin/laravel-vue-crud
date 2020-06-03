<template>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <router-link :to="{ name: 'home' }" tag="li" class="nav-link">Home</router-link>
                    <router-link :to="{ name: 'teams' }" tag="li" class="nav-link">Teams</router-link>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown"  v-if="authenticated && user">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, {{ user.name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a @click="logout" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item" v-else>
                        <router-link :to="{ name: 'login' }" class="nav-link">Login</router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            <router-view @userLoggedIn="userLoggedIn"></router-view>
        </main>
    </div>
</template>

<script>
  export default {
    data() {
        return {
          authenticated: auth.check(),
          user: auth.user
        }
    },

    methods: {
      logout () {
        auth.logout();
        this.authenticated = false;
        this.user = auth.user;
        this.$router.push({ name: 'login' })
      },
      userLoggedIn () {
        this.authenticated = true;
        this.user = auth.user
      }
    }
  }
</script>
