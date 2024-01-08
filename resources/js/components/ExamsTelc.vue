<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto pl-4">
      <p v-html="getLevelDesc.description_telc"></p>
      <!-- <p>{{getLevelDesc.description}}</p> -->
      </div>
      <!-- <h2 class="text-center ">A1</h2> -->
      <div class="col-lg m-auto">
          <div v-for="item in getExams" :key="item.id" class="">
            <!-- <router-link v-if="isLogged" :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link>
            <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
            <!-- <router-link :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link> -->

            <router-link :to="'/exam/'+item.id" class="a-link">
              <div  class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                {{ item.name }}</div></router-link>
          </div>
          

          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img :src="getLevelDesc.telc1"  class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img  :src="getLevelDesc.telc2" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-2">
                 <img  :src="getLevelDesc.telc5" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
            <div class="col-2">
              <img  :src="getLevelDesc.telc4" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
            </div>
           
             <div class="col-4">
                 
             </div>
             
             <div class="col-3">
                 <img  :src="getLevelDesc.telc3" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
             
          </div>


      </div>
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
      this.$store.dispatch('getExamsTelc',levelslug);
      this.$store.dispatch('getContactinfo');

    },
}
</script>
