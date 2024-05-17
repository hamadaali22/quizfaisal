<template>
  <div>
    <section class="login">
      <div class="container">
        <div class="row mt-5 p-3">
          <div class="col-12 col-lg-6">
            <img :src="contactInfo.image" class="img-fluid pt-3 mt-5 " alt="" style="max-width: 77%;">
          </div>
          <form class="col text-center mt-5 p-3" method="post">
            <h4 class="m-3 "> REGESTRIEN</h4>
            <input type="email" class="w-100 mb-2" placeholder="Email" v-model="email">
            <input type="password" class="w-100 mb-2" placeholder="Password" v-model="password">

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
            <input type="submit" @click.prevent="submitRegister" id="btn" value="REGESTRIEN" class="mt-2">
            <div class="d-flex justify-content-between">
              <!-- <a href="#">Register</a> -->
              <router-link to="login" style="color:#6298bf">ANMELDEN</router-link>
              <!-- <a href="#" style="color:#6298bf">Forget password</a> -->
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
