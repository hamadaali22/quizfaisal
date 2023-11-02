<template>
  <div>
    <router-view></router-view>
  </div>
</template>
<script>
    export default {
      mounted(){
        this.$store.dispatch('CheckUserAuth');
      },
      created(){
          this.updateToken();
          console.log(this.$store.state.userToken+'is my token');
          // this.logout();
      },
      methods:{
         updateToken(){
           let token =JSON.parse(localStorage.getItem('userToken'));
           this.$store.commit('setUserToken',token)
         },
      },
    }

</script>
