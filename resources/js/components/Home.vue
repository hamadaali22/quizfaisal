<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4">
            <!-- <h1 v-html="contactInfo.title" style="font-size: 19px;"></h1> -->
            <!-- <h2 v-html="contactInfo.title2" style="font-size: 16px;"></h2> -->
            <p v-html="contactInfo.about"></p>
        </div>
         <!-- <div class="row col-lg m-auto"> -->
          <!-- <img  :src="contactInfo.image" class="img-fluid w-100" alt=""> -->
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home2.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home3.png" class="img-fluid " alt=""> -->
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid w-30" alt=""> -->

        <!-- </div> -->
        <div class="col-lg ">
          <div class="row">
             <div class="col-4">
                 <img  :src="contactInfo.b1" class="img-fluid w-100" alt="Deutsch-Prüfungen">
             </div>
             <div class="col-4">
                 <img  :src="contactInfo.a2" class="img-fluid w-100" alt="Telc Deutsch">
             </div>
             <div class="col-4">
                 <img  :src="contactInfo.a1" class="img-fluid w-100" alt="Goethe Deutsch">
             </div>
          </div>
          <div class="row mt-3 mb-5">
             <div class="col-4">
                 <img  :src="contactInfo.b2" class="img-fluid w-100" alt="Teste dein Deusch">
                 <img  :src="contactInfo.c1" class="img-fluid w-100" alt="Deutsch Tests online frei">
             </div>
             <div class="col-8">
                 <img  :src="contactInfo.m1" class="img-fluid w-100" alt="Deutsch Tests online">
             </div>
          </div>
        </div>




    </section>
  </div>
</template>

<script>
export default {
  computed:{
    contactInfo(){
       return this.$store.state.contactInfo
    }
  },
  mounted(){
    this.$store.dispatch('getContactinfo');
  },
}
</script>
