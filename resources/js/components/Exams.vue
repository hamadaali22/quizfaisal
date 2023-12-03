<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto pl-4">
      <p v-html="getLevelDesc.description"></p>
      <!-- <p>{{getLevelDesc.description}}</p> -->
      </div>
      <!-- <h2 class="text-center ">A1</h2> -->
      <div class="col-lg m-auto">
          <div v-for="item in getExams" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
            <!-- <router-link v-if="isLogged" :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link>
            <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
            <router-link  :to="'/exam/'+item.id" class="a-link">{{ item.name }}</router-link>
          </div>
          <!-- <div class="level w-100 teaxt-center text-light mt-1 pt-2 pb-2">{{this.$route.params.id}}</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 3</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 4</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 5</div> -->
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
