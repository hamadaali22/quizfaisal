<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4">
            <p v-html="contactInfo.about"></p>
        </div>
        <div class="col-lg m-auto">
            <img  :src="contactInfo.image" class="img-fluid" alt="">
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
