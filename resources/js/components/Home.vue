<template>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        <h3 v-if="!authenticated">Please login</h3>
                        <h3 v-else>Welcome back!</h3>
                    </div>
                </div>
            </div>
        </div>
</template>



<script>
  export default {
    data() {
      return {
        authenticated: auth.check(),
        user: auth.user
      };
    },

    mounted() {
      this.$on('userLoggedIn', () => {
        this.authenticated = true;
        this.user = auth.user;
      });
    },
  }
</script>
