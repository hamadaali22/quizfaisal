<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4">
            <p v-html="contactInfo.about"></p>
        </div>
         <!-- <div class="row col-lg m-auto"> -->
          <!-- <img  :src="contactInfo.image" class="img-fluid w-100" alt=""> -->
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home2.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home3.png" class="img-fluid " alt=""> -->
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid w-30" alt=""> -->

        <!-- </div> -->
        <div class="col-lg m-auto">
            <div class="row">
                <div class="col-4">
                    <img  :src="contactInfo.b1" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/b1.png" class="img-fluid w-100" alt=""> -->
                </div>
                <div class="col-4">
                    <img  :src="contactInfo.a2" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/1stpageA2.png" class="img-fluid w-100" alt=""> -->
                </div>
                <div class="col-4">
                    <img  :src="contactInfo.a1" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/1stpage-A1.png" class="img-fluid w-100" alt=""> -->
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-4">
                    <img  :src="contactInfo.b2" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/1stpageB2-red.png" class="img-fluid mb-3 w-100" alt=""> -->
                    <img  :src="contactInfo.c1" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/1stPage-C1.png" class="img-fluid w-100" alt=""> -->
                </div>
                <div class="col-8">
                    <img  :src="contactInfo.m1" class="img-fluid w-100" alt="">
                    <!-- <img src="http://127.0.0.1:8000/img/settings/1stpage-maindesign.png" class="img-fluid w-100" alt=""> -->
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
