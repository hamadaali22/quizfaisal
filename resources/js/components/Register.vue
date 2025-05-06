<template>
  <div>
    <section class="login">
      <div class="container">
        <div class="row mt-5 p-3">
          <div class="col-12 col-lg-6">
            <img :src="contactInfo.image" class="img-fluid pt-3 mt-5 " alt=""
              style="max-width: 77%;    padding-left: 62px;">
          </div>
          <div class=" col-12 col-lg-6">
            <div class=" col-12 col-lg-12">
              <form class="col text-center mt-5 p-3" method="post">
                <h4 class="m-3 "> Registrieren</h4>
                <input type="email" class="w-100 mb-2" placeholder="Email" v-model="email">
                <input type="password" class="w-100 mb-2" placeholder="Passwort" v-model="password">

                <input type="text" class="w-100 mb-2" placeholder="Name" v-model="name">
                <!-- <input type="text" class="w-100 mb-2" placeholder="Handynummer" v-model="mobile"> -->
                <!-- <input type="text" class="w-100 mb-2" placeholder="Sprache" v-model="Language"> -->
                <!-- <input type="text" class="w-100 mb-2" placeholder="Land" v-model="Country"> -->


                <!-- <select class="w-100 mb-2 form-control formselect" v-model="country">
                        <option selected value=""> Country </option>
                        <option  value="Deutschland">Deutschland</option>
                        <option  value="Österreich">Österreich</option>
                          <option  value="Schweiz">Schweiz</option>
                        <option  value="Niederlande">Niederlande</option>
                        <option  value="Frankreich">Frankreich</option>
                        <option  value="Polen">Polen</option>
                        <option  value="Tschechische Republik">Tschechische Republik</option>
                        <option  value="Ungarn">Ungarn</option>
                        <option  value="Dänemark">Dänemark</option>
                        <option  value="Großbritanien">Großbritanien</option>
                        <option  value="USA">USA</option>
                        <option  value="Brasilien">Brasilien</option>
                        <option  value="China">China</option>
                        <option  value="Indien">Indien</option>
                        <option  value="andere">andere</option>
                      </select>
                      <select class="w-100 mb-2 form-control formselect" v-model="language">
                        <option selected value=""> Language </option>
                        <option  value="Arabisch">Arabisch</option>
                        <option  value="Deutsch">Deutsch</option>
                        <option  value="Englisch">Englisch</option>
                        <option  value=" Französisch"> Französisch</option>
                        <option  value="Spanisch ">Spanisch </option>
                        <option  value="andere ">andere </option>
                      </select> -->

                <!-- <input type="submit" @click.prevent="submitRegister" id="btn" value="Registrieren" class="mt-2 w-50"
                  style="border-radius: 10px;">
                <a href="google-login">
                  <button class="google-login-button mt-2">
                    <img src="/img/googlelogin.png" alt="Google Logo" width="20" height="20">
                    Registrieren Mit Google
                  </button>
                </a> -->
                <div class="row">
                  <div class="col-md-12 mb-3 d-grid">
                    <!-- <button class="btn btn-primary w-100" id="btn"> Registrieren</button> -->
                    <!-- <input type="submit" @click.prevent="submitRegister" id="btn" 
                      :value="isLoading ? 'جاري التسجيل...' : 'Registrieren'"
                      :disabled="isLoading"
                      class="btn btn-primary w-100 mt-3" style="border-radius: 10px;"> -->

                      <button @click.prevent="submitRegister" class="btn btn-primary w-100 mt-3" style="border-radius: 10px;":disabled="isLoading">
                        <span v-if="isLoading">
                          <i class="fas fa-spinner fa-spin"></i>&nbsp;&nbsp; Registrieren
                        </span>
                        <span v-else>
                          <!-- <i class="fas fa-user-plus"></i> -->
                           Registrieren
                        </span>
                      </button>
                  </div>
                  <!-- <div class="col-md-6 mb-3 d-grid">
                    <button class="btn google-login-button w-100 mt-3">
                      <img src="/img/googlelogin.png" alt="Google Logo" width="20" height="20">
                      Registrieren Mit Google
                    </button>
                  </div> -->
                </div>

                <div class="d-flex justify-content-between">
                  <!-- <a href="#">Register</a> -->
                  <router-link to="login" style="color:#6298bf">ANMELDEN</router-link>
                  <!-- <a href="#" style="color:#6298bf">Forget password</a> -->
                </div>
              </form>
            </div>
            <!-- <div class=" col-12 col-lg-12" style="padding: 3px 27px 5px 32px;">
                <router-link to="login" style="color:#6298bf">ANMELDEN</router-link>
            </div> -->
            <div class=" col-12 col-lg-12  mr-4 " style="padding: 3px 27px 5px 32px;">
                <a href="google-login" style="text-decoration:none;">
                  <button class="google-login-button w-100 mt-3">
                    <img src="/img/googlelogin.png" alt="Google Logo" width="20" height="20">
                    Registrieren Mit Google
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
export default {
  data() {
    return {
      isLoading: false,
      password: '',
      email: '',
      name: '',
      mobile: '',
      language: '',
      country: '',

    }
  },
  computed: {
    contactInfo() {
      return this.$store.state.contactInfo;
    }
  },
  created() {
    console.log(this.$store.state.userToken);

  },
  mounted() {
    this.$store.dispatch('getContactinfo');

  },
  methods: {
    submitRegister() {
      this.isLoading = true;
      //console.log('submitted');
      //client sid  localstorage sessionstorage indexed db   state managment system
      //vue vuex

      //this.$store.state.userToken = "amine"

      //this.$store.commit('setUserToken',{userToken:'sdmfjsdkfjlsds'})
      // console.log(this.$store.getters.isLogged)
      // console.log(this.$store.state.userToken);
      console.log(this.name);
      console.log(this.email);
      console.log(this.password);
      console.log(this.mobile);
      console.log(this.language);
      console.log(this.country);
      let { name, email, password, mobile, language, country } = this;
      this.$store.dispatch('RegisterUser', { name, email, password, mobile, language, country })

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