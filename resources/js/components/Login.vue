<template>
  <div>
    <section class="login">
      <div class="container">
        <div class="row mt-5 p-3">
          <div class=" col-12 col-lg-6">

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

            <input type="submit" @click.prevent="submitLogin" id="btn" value="Anmelden" class="mt-2 w-50"><br>
            <a href="google-login"> <img src="/img/google-login.png" class="img-fluid pt-1 mt-2 w-50"
                alt="Example Image" style="width:298px; border-radius: 23px;"></a>
            <div class="d-flex justify-content-between">
              <!-- <a href="#" style="color:#6298bf">Register</a> -->
              <router-link to="register" style="color:#6298bf">Regestrieren</router-link>
              <a href="google/redirect" style="color:#6298bf">{{ googleparam }}</a>
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
      request_path: this.$route.path,
    }
  },
  created() {
    // console.log(this.$store.state.userToken);
    console.log(this.request_path);


  },
  computed: {

  },
  mounted() {
    if (this.request_path == '/google/callback') {
      swal({
        title: 'Erfolgreich registriert',
        text: 'Sie haben sich erfolgreich angemeldet',
        icon: "success",
        timer: 4000
      });
      this.$router.push({ name: 'Home' })
      // this.$router.push('/another');
    }
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
