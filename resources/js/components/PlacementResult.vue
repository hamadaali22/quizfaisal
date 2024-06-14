<template>
  <div>
    <section class="row home-main-section p-5 container-fluid" v-if="this.result">
      <div class=" col-lg m-auto pl-4 text-center">
        <p>level: {{ this.levelName }}</p>
      </div>
      <div class=" col-lg m-auto pl-4 text-center">
        <p>type: {{ this.type }}</p>
      </div>
      <div class=" col-lg m-auto pl-4 text-center">
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

    <section class="questions  m-4 ">
      <div v-for="(item, itemIndex) in getQuizesTest" :key="item.id" class="mcq p-2">
        <div class="row">
          <h6>{{ itemIndex + 1 }}- {{ item.quizes.title }}</h6>
        </div>

        <div class="row  ml-3">
          <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3"
            :id="'quize' + itemIndex + 'a'"
            v-bind:class="[getChoiceClass(item.quizes.first_choice, item.answer, item.quizes.expected_answer)]">
            <input class=" multi-input d-none" type="radio" name="q-1">
            <label class="multi-label">{{ item.quizes.first_choice }}</label>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3"
            :id="'quize' + itemIndex + 'b'"
            v-bind:class="[getChoiceClass(item.quizes.second_choice, item.answer, item.quizes.expected_answer)]">
            <input class=" multi-input d-none" type="radio" name="q-1">
            <label class="multi-label">{{ item.quizes.second_choice }}</label>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3"
            :id="'quize' + itemIndex + 'c'"
            v-bind:class="[getChoiceClass(item.quizes.third_choice, item.answer, item.quizes.expected_answer)]">
            <input class=" multi-input d-none" type="radio" name="q-1">
            <label class="multi-label">{{ item.quizes.third_choice }}</label>
          </div>
        </div>
        <div class="row ml-3">
          <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3"
            :id="'quize' + itemIndex + 'd'"
            v-bind:class="[getChoiceClass(item.quizes.fourth_choice, item.answer, item.quizes.expected_answer)]">
            <input class=" multi-input d-none" type="radio" name="q-1">
            <label class="multi-label">{{ item.quizes.fourth_choice }}</label>
          </div>
        </div>
      </div>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
    </section>

  </div>
</template>
<style>
.quize-rong {
  background: #f6c0c4;
}

.quize-succes {
  background: #28d095;
}

.quize-expected {
  background: blue;
}
</style>
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
  computed: {
    getQuizesTest() {
      return this.$store.state.QuizesTest
    }
  },
  created() {
    this.getUserdata();
  },
  mounted() {
    this.$store.dispatch('userQuizesTest');
    // this.itemId = this.$route.params.id;
  },
  methods: {
    getChoiceClass(choice, answer, expected) {

      if (choice === expected) {
        return answer === choice ? 'quize-succes' : 'quize-succes';
      } else if (choice == answer) {
        return 'quize-rong';
      } else {
        return "";
      }
    },
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