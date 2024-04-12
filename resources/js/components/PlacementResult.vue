<template>
  <div>
    <section class="row home-main-section p-5 container-fluid" v-if="this.result">
      <div class=" col-lg m-auto pl-4 text-center">
        <p>level: {{ this.levelName }}</p>
        <p>type: {{ this.type }}</p>
        <p>correct answer: {{ this.correct }}</p>
      </div>
      <!-- <h2 class="text-center ">Sie müssen sich registrieren, um Ihr Ergebnis zu erhalten und die Musterlösung zu sehen.</h2> -->

      <br><br><br>
    </section>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto pl-4">

        <router-link :to="'/placement-questions'" class="a-link">
          <div class="level  w-50 text-center text-light mt-1 pt-2 pb-2">
            Start Test
          </div>
        </router-link>
      </div>


    </section>
    <!-- <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' ? 'fixed-bottom' : '']">
        <p>dfvdf</p>
        </footer> -->
  </div>
</template>

<script>

export default {
  data() {
    return {
      result: null,
      levelName: null,
      type: null,
      correct: null
    };
  },
  created() {
    this.getUserdata();
  },
  mounted() {
    // this.itemId = this.$route.params.id;
  },
  methods: {
    getUserdata() {
      const headers = {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + this.$store.state.userToken.token
      };
      axios.get('https://deutschtests.com/api/quizes-result', { headers })
        .then(res => {
          this.result = res.data.data;
          if (res.data.data) {
            console.log(res.data);

            this.levelName = res.data.data.levelName;
            this.type = res.data.data.type;
            this.correct = res.data.data.correct;
          }
        })
        .then(err => console.log(err))

    }
  }



}
</script>