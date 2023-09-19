<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4">
            <p v-html="contactInfo.about"></p>
        </div>
        <div class="row col-lg m-auto">
          <img  :src="contactInfo.image" class="img-fluid w-100" alt="">
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home2.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home3.png" class="img-fluid " alt=""> -->
          <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid w-30" alt=""> -->

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
