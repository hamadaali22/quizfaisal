<template>
  <div>
    <section class="login">
      <div class="container">
        <div class="row mt-5 p-3">
          <div class=" col-12 col-lg-6">
            <img :src="contactInfo.image" class="img-fluid pt-3 mt-5 " alt="" style="max-width: 77%;">
          </div>
          <form class="col text-center" method="post">
            <h4 class="m-3  mt-5 p-3">ANMELDEN</h4>

            <!-- <router-link  to="/levels" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">3</span>
                        </div>
                        <p>Wishlist</p>
                    </router-link> -->
            <input type="email" class="w-100 mb-2" placeholder="Email" v-model="email" style="margin-top: 32px;">

            <input type="password" class="w-100 mb-2" placeholder="Password" v-model="password"
              style="margin-top: 32px;">

            <input type="submit" @click.prevent="submitLogin" id="btn" value="Anmelden" class="mt-2">
            <div class="d-flex justify-content-between">
              <!-- <a href="#" style="color:#6298bf">Register</a> -->
              <router-link to="register" style="color:#6298bf">Regestrieren</router-link>
              <router-link to="forgetpassword" style="color:#6298bf">Passwort vergessen</router-link>
              <!-- <a href="#" style="color:#6298bf">Passwort vergessen</a> -->
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import swal from "sweetalert";
export default {
  data() {
    return {
      password: '',
      email: '',
    }
  },
  created() {
    // console.log(this.$store.state.userToken);
  },
  computed: {
    contactInfo() {
      return this.$store.state.contactInfo
    }
  },
  mounted() {
    this.$store.dispatch('getContactinfo');
  },
  methods: {
    submitLogin() {
      let { email, password } = this;
      this.$store.dispatch('LoginUser', { email, password })
      console.log(this.$store.state.userToken + 'hamada sign');
      // this.$toaster.success('Your toaster success message.');
      // swal({
      //     text: "User signup successful, please login",
      //     icon: "success",
      //     title: 'Logged in successfully',
      //     timer: 2500
      // });

    }
  }
}
</script>
