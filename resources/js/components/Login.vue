<template>
  <div>
    <section class="login">
      <div class="container">
        <div class="row mt-5 p-3">
          <div class=" col-12 col-lg-6">

            <img :src="contactInfo.image" class="img-fluid pt-3 mt-5 " alt="" style="
              max-width: 77%; padding-left: 62px;">
          </div>
          <div class=" col-12 col-lg-6">
            <div class=" col-12 col-lg-12">
              <form class="col text-center" method="post">
                <h4 class="m-3  mt-3 p-3">{{ $t('LogIn') }}</h4>

                <!-- <router-link  to="/levels" title="Wishlist">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count badge">3</span>
                            </div>
                            <p>Wishlist</p>
                        </router-link> -->
                <input type="email" class="w-100 mb-2" :placeholder="$t('Email')" v-model="email" style="margin-top: 32px;">

                <input type="password" class="w-100 mb-2" :placeholder="$t('Password')" v-model="password"
                  style="margin-top: 32px;">
                <!-- <input type="submit" @click.prevent="submitLogin" id="btn" value="Anmelden" class="mt-2 w-50"
                  style="border-radius: 10px;">
                <a href="google-login">
                  <button class="google-login-button mt-2 ">
                    <img src="/img/googlelogin.png" alt="Google Logo" width="20" height="20">
                    Anmelden Mit Google
                  </button>
                </a> -->
                <div class="row">
                  <div class="col-md-12 mb-3 d-grid">
                    <input type="submit" @click.prevent="submitLogin" id="btn" :value="$t('LogIn')"
                      class="btn btn-primary w-100 mt-3" style="border-radius: 10px;">
                  </div>
                </div>
                
              </form>
            </div>
            
            <div class=" col-12 col-lg-12" style="padding: 3px 27px 5px 32px;">
              <div class="d-flex justify-content-between">
                <!-- <a href="#" style="color:#6298bf">Register</a> -->
                <router-link to="register" style="color:#6298bf">{{ $t('Register') }}</router-link>
                <a href="google/redirect" style="color:#6298bf">{{ googleparam }}</a>
                <router-link to="forgetpassword" style="color:#6298bf"> {{ $t('forgottenYourPassword') }}</router-link>
                <!-- <a href="#" style="color:#6298bf">Passwort vergessen</a> -->
              </div>
            </div>
            <div class=" col-12 col-lg-12  mr-4 " style="padding: 3px 27px 5px 32px;">
              <a href="google-login" style="text-decoration:none;">
                <button class="btn google-login-button w-100 mt-3">
                  <img src="/img/googlelogin.png" alt="Google Logo" width="20" height="20">
                  {{ $t('RegisterWithGoogle') }}
                </button>
              </a>
            </div>
          </div>
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
    contactInfo() {
      return this.$store.state.contactInfo
    },
  },
  mounted() {
    this.$store.dispatch('getContactinfo');
    if (this.request_path == '/google/callback') {
      swal({
        title: 'Erfolgreich registriert',
        text: 'Sie haben sich erfolgreich angemeldet',
        icon: "success",
        timer: 4000
      });
      this.$router.push({ name: 'Home' })

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
<style>
.google-login-button {
  background-color: #fff;
  color: #787878;
  border: none;
  padding: 10px 20px;
  text-align: center;
  font-size: 16px;
  border-radius: 10px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
}

.google-login-button img {
  margin-right: 10px;
}
</style>