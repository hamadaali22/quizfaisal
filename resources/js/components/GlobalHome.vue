<template>
  <div>
     <language-switcher></language-switcher>
    <router-view></router-view>

    <!-- <div v-if="processedData">
      <p>ID: {{ processedData }}</p>
      <p>Title: {{ processedData.name }}</p>
      <p>Content: {{ processedData.email }}</p>
    </div> -->
  </div>
</template>
<script>

export default {

  computed: {
    processedData() {
      return this.$store.state.userToken;
    }
  },
  mounted() {
    this.$store.dispatch('CheckUserAuth');
  },
  created() {
    this.updateToken();
    console.log(this.$store.state.userToken + 'is my token');
    // this.logout();
  },
  methods: {
    updateToken() {
      let token = JSON.parse(localStorage.getItem('userToken'));
      this.$store.commit('setUserToken', token)
    },
  },
}

</script>
