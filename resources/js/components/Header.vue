<template>
  <div>
    <nav class="navbar navbar-expand-lg back w-100 pt-0 pb-0">
      <a href="/" class="navbar-brand text-light" id="brand">
        <img :src="contactInfo.logo" class="footer-logo" alt="“deutschtests Logo" width="70" height="70">
        Deutschtests
      </a>
      <a href="#x" data-toggle="collapse" class="navbar-toggler">
        <i class="fa-solid fa-bars navbar-toggler-icon text-light" id="nav-icon"></i>
      </a>
      <div class="collapse navbar-collapse" id="x">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <li class="nav-item p-1 active "><router-link to="/" class="nav-link text-light">Home
             <!-- {{ $t('logIn') }}  -->
               <!-- {{ this.$i18n.locale }} -->
            </router-link></li>
          <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="levels" class="nav-link text-light">GOETHE</router-link></li> -->
          <li class="nav-item p-1 active "><router-link to="/goethe-tests"
              class="nav-link text-light">Goethe</router-link></li>
          <li class="nav-item p-1 active "><router-link to="/telc-tests" class="nav-link text-light">Telc</router-link>
          </li>
          <!-- <li class="nav-item p-1 active "><router-link to="/placement-test"
              class="nav-link text-light">Placement</router-link></li> -->

          <li v-if="!isLogged" class="nav-item p-1 active "><router-link to="/login"
              class="nav-link text-light">Anmelden</router-link></li>
          <li v-if="!isLogged" class="nav-item p-1 active "><router-link to="/register"
              class="nav-link text-light">Registrieren</router-link></li>
          <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/goethe-user-exam"
              class="nav-link text-light">Meine Tests</router-link></li>
          <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/placement-result"
              class="nav-link text-light">Placement Result</router-link></li> -->



          <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/profile" class="nav-link text-light">Profile</router-link></li> -->

          <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/telc-user-exam" class="nav-link text-light">telc user exam</router-link></li> -->
          
          <li v-if="isLogged" @click.stop="logout" class="nav-item p-1 active "><router-link to="register"
              class="nav-link text-light">Abmelden</router-link></li>
          <!-- <div class="btn-group dropup">
              <button type="button" class="btn header-btn dropdown-toggle" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  language
              </button>
              <div class="dropdown-menu p-2">
                  
                  <p> <a href="lang/ar" class="text-dark">arabic</a></p>
                  <p><a href="lang/en" class="text-dark">englis</a></p>
              </div>
          </div> -->
          <b-dropdown id="dropdown-1" text="language" class="m-md-2" style="    color: #242424 !important;
    background-color: #efefef !important;">
        <b-dropdown-item @click="changeLanguage('de')">Deutsch</b-dropdown-item>
        <b-dropdown-item @click="changeLanguage('en')">English</b-dropdown-item>
        <b-dropdown-item @click="changeLanguage('ar')">العربية</b-dropdown-item>
        <b-dropdown-item @click="changeLanguage('fr')">Français</b-dropdown-item>
        <b-dropdown-item @click="changeLanguage('es')">Español</b-dropdown-item>
      </b-dropdown>
          <!-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div> -->
          
          <!-- <li class="nav-item p-1 active "><router-link to="/noresult" class="nav-link text-light">noresult</router-link></li> -->



          <!-- <li class="nav-item p-1 active"><a href="home" class="nav-link text-light">HOME</a></li>
                <li class="nav-item p-1"><a href="levels" class="nav-link text-light">GOETHE</a></li>
                <li  v-if="!isLogged" class="nav-item p-1"><a href="login" class="nav-link text-light">ANMELDEN</a></li>
                <li v-if="!isLogged" class="nav-item p-1"><a href="login" class="nav-link text-light">REGISTER</a></li>
                <li  v-if="isLogged" @click.stop="logout" class="nav-item p-1"><a href="login" class="nav-link text-light">logout</a></li> -->
        </ul>
      </div>
    </nav>
  </div>
</template>


<script>
export default {
  data() {
    return {
      
    }

  },
  mounted() {
    this.$store.dispatch('getContactinfo');
  },

  computed: {
    isLogged() {
      return this.$store.getters.isLogged
    },
    contactInfo() {
      return this.$store.state.contactInfo
    }
  },
  methods: {
    logout() {
      this.$store.commit('logout')
    },
    changeLanguage(lang) {
            this.$i18n.locale = lang; // تحديث اللغة في التطبيق
            localStorage.setItem('preferredLanguage', lang); // تخزين اللغة في localStorage
            const currentPath = window.location.pathname;
            const newPath = `/${lang}` + currentPath.replace(/^\/(en|ar|de|fr|es)/, ''); // تعديل URL
            window.history.pushState(null, '', newPath); // تحديث عنوان URL دون تحديث الصفحة
        }
  }


}
</script>

<style>
@media (min-width: 992px) {
    .navbar-expand-lg .dropup .dropdown-menu {
        /* top: auto; */
        bottom: -70%;
    }
}

  .dropdown .b-dropdown .m-md-2 .btn-group {
    color : #242424 !important;
    background-color: #efefef !important;
  }
  .btn-group > .btn:first-child {
      color: #242424 !important;
      background-color: #efefef !important;
      border-radius: 3px !important;
  }
  </style>
