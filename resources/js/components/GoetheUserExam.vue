<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <!-- <div class="col-lg m-auto pl-4">

      </div> -->
      <!-- <h2 class="text-center ">A1</h2> -->
      <div class="col-lg m-auto">
          <div v-for="item in goetheUserExams" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
            <router-link v-if="isLogged" :to="'/goethe-report/'+item.id" class="a-link">{{ item.name }}</router-link>
            <!-- <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
          </div>
          <div v-for="_item in telcUserExams" :key="_item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
            <router-link v-if="isLogged" :to="'/goethe-report/'+_item.id" class="a-link">{{ _item.name }}</router-link>
          </div>
          <!-- <div class="level w-100 teaxt-center text-light mt-1 pt-2 pb-2">{{this.$route.params.id}}</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 3</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 4</div>
          <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">Test 5</div> -->
      </div>
  </section>

  </div>
</template>

<script>
export default {

    data(){
      return {
        userId:this.$store.state.userToken.id,

      }
    },
    computed:{
      goetheUserExams(){
        return this.$store.state.goetheUserExam
      },
      telcUserExams(){
        return this.$store.state.TelcUserExam
      },

      isLogged(){
        return this.$store.getters.isLogged
      }
    },
    // created() {
    //     console.log(this.$store.state.userToken);
    //     console.log('fffffjfjfjfjfjnnnn');
    //
    //
    // },
    mounted(){
      this.$store.dispatch('getGoetheUserExams', { userId: this.userId});
      this.$store.dispatch('getTelcUserExams', { userId: this.userId});
    },

}
</script>
