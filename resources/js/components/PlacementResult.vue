<template>
    <div>
      <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4 text-center">
            <p>level: {{ this.levelName }}</p>
            <p>type: {{ this.type }}</p>
            <p>correct answer: {{ this.correct }}</p>
        </div>
        <!-- <h2 class="text-center ">Sie müssen sich registrieren, um Ihr Ergebnis zu erhalten und die Musterlösung zu sehen.</h2> -->

        <br><br><br>
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
      // itemId: null,
      levelName:null,
      type:null,
      correct:null
    };
  },
  created(){
    this.getUserdata();
  },
  mounted() {
    // this.itemId = this.$route.params.id;
  },
  methods:{
  getUserdata(){
        const headers = {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer '+this.$store.state.userToken.token
          };
          axios.get('https://deutschtests.com/api/quizes-result',{headers})
          .then(res => {
              console.log(res.data);
              this.levelName = res.data.data.levelName;
              this.type=res.data.data.type;
              this.correct=res.data.data.correct;
              
            })
            .then(err => console.log(err))
    }
  }
  

 
 }
 </script>
 
 
 
 