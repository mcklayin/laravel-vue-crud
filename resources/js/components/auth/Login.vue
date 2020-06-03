<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
                    <form @submit.prevent="login">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" id="username" name="username" v-model="username"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" id="password" name="password" v-model="password"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import ValidationErrors from '../ValidationErrors.vue';
  export default {
    data() {
      return {
        username: 'admin@gmail.com',
        password: 'admin',
        validationErrors: false
      };
    },
    components: {
      ValidationErrors
    },
    methods: {
      login() {
        let data = {
          username: this.username,
          password: this.password
        };

        api.call('post', '/login', data)
        .then(({data}) => {
          auth.login(data.token, data.user);
          this.$emit('userLoggedIn', data.user);
          this.$router.push({ name: 'teams' })
        })
        .catch((response) => {
          this.validationErrors = [response.data.message];
          console.log(response);
        });
      }
    }
  }
</script>