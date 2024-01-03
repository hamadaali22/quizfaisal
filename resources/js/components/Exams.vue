<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg pl-4">
      <p v-html="getLevelDesc.description"></p>
      <!-- <p>{{getLevelDesc.description}}</p> -->
      </div>
      <!-- <h2 class="text-center ">A1</h2> -->
      <div class="col-lg m-auto">
          <div v-for="item in getExams" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
            <!-- <router-link v-if="isLogged" :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link>
            <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
            <router-link  :to="'/exam/'+item.id" class="a-link">{{ item.name }}ss</router-link>
          </div>



          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img :src="getLevelDesc.goethe1"  class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-4">
            </div>
             <div class="col-5">
                 <img  :src="getLevelDesc.goethe2" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-2">
                 <img  :src="getLevelDesc.goethe5" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
             </div>
            <div class="col-2">
              <img  :src="getLevelDesc.goethe4" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
            </div>
           
             <div class="col-4">
                 
             </div>
             
             <div class="col-3">
                 <img  :src="getLevelDesc.goethe3" class="img-fluid w-100" alt="Goethe-Deutsch-Prüfungen">
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
}
</script>
