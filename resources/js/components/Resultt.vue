<template>
  <section class="container">
        <div class="student">
            <h1 class="text-center mt-2 mb-2">Ihr Ergebnis </h1>
            <div class="row text-center pt-2">
                <div class="col back pt-4  border border-raduis text-light"><h6>Lesen </h6></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.count_read_succes}}</span>/<span>{{getResult.count_read}}</span></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.count_read_percent}}</span>%</div>
                <div class="col pt-4 border border-raduis"><p v-if="getResult.count_read_percent >= 60">bestanden</p><p v-else>Nicht bestanden</p></div>
            </div>
            <div class="row text-center">
                <div class="col back pt-4 border border-raduis text-light"><h6>Hören</h6></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.count_listen_succes}}</span>/<span>{{getResult.count_listen}}</span></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.count_listen_percent}}</span>%</div>
                <div class="col pt-4 border border-raduis"><p v-if="getResult.count_listen_percent >= 60">bestanden</p><p v-else>Nicht bestanden</p></div>
            </div>
            <br>
            <div class="level w-50 text-center text-light mt-1 pt-2 pb-2">
              <router-link v-if="isLogged" :to="'/goethe-report/'+this.examId" class="a-link">Ihr detailliertes Ergebnis</router-link>
              <!-- <router-link v-else :to="'/login'" class="a-link">{{ item.name }}</router-link> -->
            </div>
            <!-- <div class="row text-center">
                <div class="col back pt-4 border border-raduis text-light"><h6>Total</h6></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.total}}</span>/<span>100</span></div>
                <div class="col pt-4 border border-raduis"><span>{{getResult.total}}</span>%</div>
                <div class="col pt-4 border border-raduis"><p>.</p></div>
            </div> -->
        </div>
    </section>
</template>
<script>
export default {
  data(){
    return {
        userId:this.$store.state.userToken.id,
        examId:this.$route.params.examId,
    }
  },

  computed:{
    getResult(){
      return this.$store.state.Results
    },
    isLogged(){
      return this.$store.getters.isLogged
    }
  },

  mounted(){
    this.$store.dispatch('getQuestionResult', { userId: this.userId,examId: this.examId});

  },
  methods: {

  }
}
</script>
