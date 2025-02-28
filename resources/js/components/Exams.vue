<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg pl-4">
          <!-- getLevelDesc.description  -->
      <p v-html="getLocalizedDesc(getLevelDesc)"></p>
      <!-- <p>{{ getLevelDesc.level_images[0].name }}</p> -->
      <!-- <p>{{getLevelDesc.description}}</p> -->
      </div>
      <!-- <h2 class="text-center ">A1</h2> -->
      <div class="col-lg m-auto">
          <div v-for="item in getExams" :key="item.id" >
            <!-- <router-link v-if="isLogged" :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link>
            <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
            <router-link  :to="'/exam/'+item.id" class="a-link">
              <div  class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                {{ item.name }}</div></router-link>
          </div>



          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img :src="'https://deutschtests.com/img/goethe/'+getLevelDesc.level_images[0].name"  class="img-fluid w-100" :alt="getLevelDesc.alt_goethe1">
             </div>
             
          </div>
          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img  :src="'https://deutschtests.com/img/goethe/'+getLevelDesc.level_images[1].name" class="img-fluid w-100" :alt="getLevelDesc.alt_goethe2">
             </div>
             
          </div>
          <div class="row">
            <div class="col-2">
                 <img  :src="'https://deutschtests.com/img/goethe/'+getLevelDesc.level_images[4].name" class="img-fluid w-100" :alt="getLevelDesc.alt_goethe5">
             </div>
            <div class="col-2">
              <img  :src="'https://deutschtests.com/img/goethe/'+getLevelDesc.level_images[3].name" class="img-fluid w-100" :alt="getLevelDesc.alt_goethe4">
            </div>
           
             <div class="col-4">
                 
             </div>
             
             <div class="col-3">
                 <img  :src="'https://deutschtests.com/img/goethe/'+getLevelDesc.level_images[2].name" class="img-fluid w-100" :alt="getLevelDesc.alt_goethe3">
             </div>
             
          </div>



          
      </div>
      <br><br><br>
    </section>

  </div>
</template>

<script>
export default {

    data(){
        return {
            // levelId:this.$route.params.id,
            levelslug:this.$route.params.slug,
        }
    },
    computed:{
      getExams(){
        return this.$store.state.exams
      },
      getLevelDesc(){
        return this.$store.state.LevelDesc
      },
      contactInfo(){
         return this.$store.state.contactInfo
      },
      isLogged(){
        return this.$store.getters.isLogged
      }
    },
    created() {
        console.log(this.$store.state.userToken);
        console.log('fffffjfjfjfjfjnnnn');


    },
    mounted(){

      let {levelslug} = this;
      this.$store.dispatch('getExams',levelslug);
      this.$store.dispatch('getContactinfo');

    },
    methods: {
      getLocalizedDesc(item) {
        const slugs = {
          en: item.description_en,
          ar: item.description_ar,
          fr: item.description_fr,
          es: item.description_es,
          de: item.description_de,
        };
        // console.log(this.$i18n.locale);
        return slugs[this.$i18n.locale] || item.description_de;
      }
    },
}
</script>
