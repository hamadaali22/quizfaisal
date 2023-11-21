
<template>
  <div>
    <nav class="navbar navbar-expand-lg back w-100 pt-0 pb-0">
        <a href="/" class="navbar-brand text-light" id="brand">
          <!--Deutschtests-->
            <img src="{{asset('img/settings/'.$contact->logo) }}" class="footer-logo" alt="Footer Logo" width="80" height="80"><br>

        </a>
        <a href="#x" data-toggle="collapse" class="navbar-toggler">
            <i class="fa-solid fa-bars navbar-toggler-icon text-light" id="nav-icon"></i>
        </a>
        <div class="collapse navbar-collapse" id="x">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                <li class="nav-item p-1 active "><router-link to="/" class="nav-link text-light">Home</router-link></li>
                <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="levels" class="nav-link text-light">GOETHE</router-link></li> -->
                <li class="nav-item p-1 active "><router-link to="/goethe-tests" class="nav-link text-light">Goethe</router-link></li>
                <li class="nav-item p-1 active "><router-link to="/telc-tests" class="nav-link text-light">Telc</router-link></li>
                <li v-if="!isLogged" class="nav-item p-1 active "><router-link to="/login" class="nav-link text-light">Anmelden</router-link></li>
                <li v-if="!isLogged" class="nav-item p-1 active "><router-link to="/register" class="nav-link text-light">Registrieren</router-link></li>
                <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/goethe-user-exam" class="nav-link text-light">Meine Tests</router-link></li>
                <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/profile" class="nav-link text-light">Profile</router-link></li> -->

                <!-- <li v-if="isLogged" class="nav-item p-1 active "><router-link to="/telc-user-exam" class="nav-link text-light">telc user exam</router-link></li> -->

                <li v-if="isLogged" @click.stop="logout" class="nav-item p-1 active "><router-link to="register" class="nav-link text-light">Abmelden</router-link></li>




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
    methods:{
      logout(){
         this.$store.commit('logout')
      }
    },
    computed:{
      isLogged(){
        return this.$store.getters.isLogged
      }
    }
  }
</script>
