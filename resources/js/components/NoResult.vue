<template>
    <div>
      <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4 text-center">
            <p>Sie müssen sich registrieren, um Ihr Ergebnis zu erhalten und die Musterlösung zu sehen.</p>
            <p> Sie haben noch kein Konto? <router-link to="register" style="color:#6298bf"> Regestrieren </router-link>Sie haben schon ein Konto <router-link to="login" style="color:#6298bf"> ANMELDEN</router-link></p>
        </div>
        <!-- <h2 class="text-center ">Sie müssen sich registrieren, um Ihr Ergebnis zu erhalten und die Musterlösung zu sehen.</h2> -->

        <br><br><br>
       </section>
       
       <!-- <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' ? 'fixed-bottom' : '']">
        <p>dfvdf</p>
        </footer> -->
    </div>
 </template>
 
 <script>
 
 export default {
   data(){
     return {
     }
 
   },
   
 
 }
 </script>
 
 
 
 