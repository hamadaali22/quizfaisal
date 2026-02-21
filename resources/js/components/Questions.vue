<template>
  <div>
    <a href="hamada"></a>

    

    <div v-for="item in getQuestion" :key="item.id" :style="$i18n.locale==='ar' ? 'direction: ltr; text-align: left;' : 'direction: ltr; text-align: left;'">
      <section class="row bg-white m-2 p-1 ">
        <div class="col-lg-11 col-md-10  border border-raduis mb-2">
          <!-- <h6>Title</h6> -->

          <p v-html="item.bio"></p>
        </div>
        <!-- <p class="col ml-3  text-center pt-4 mt-2 "><span>00</span>:<span>00</span>:<span>00</span></p> -->
        <div v-if="item.type == 'listening'" class="col-11 audio-parent text-center pt-1 bg-white">
          <audio controls class="align-items-center w-50" controlsList="nodownload">
            <source :src="item.file" type="audio/ogg">
            <source :src="item.file" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <div class="col-2"></div>
        </div>
        <div v-if="item.type == 'listening and image'" class="col-11 audio-parent text-center pt-1 bg-white">
          <audio controls class="align-items-center w-50" controlsList="nodownload">
            <source :src="item.file" type="audio/ogg">
            <source :src="item.file" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
          <div class="col-2"></div>
        </div>
      </section>
      <section class="questions  row m-2 p-1">
        <div v-if="(item.type != 'listening') && (item.type != 'sub')" class="col-lg-7 main-text col-md-8 mt-md-3 ml-md-auto mr-md-auto p-2 mt-3 mr-lg-2 bg-white">
          <!-- <h2>Title</h2>
              <h5>Sub Title Sub Title Sub Title</h5> -->

          <p v-if="item.type == 'reading'" v-html="item.paragraph"> </p>
          <img v-if="item.type == 'image'" :src="item.image">
          <img v-if="item.type == 'listening and image'" :src="item.image">
        </div>
        <div class="col-lg main-quiz col-md-8 ml-md-auto mr-md-auto pr-2 pl-2 mt-3 text-left bg-white">
          <!-- <SubQuestions :SubQuestions="item" ></SubQuestions> -->

          <div v-for="(SubQuestions, index) in item.subquestion" :key="SubQuestions.id">
            <!-- multiple_choice -->
            <div v-if="SubQuestions.answer_type == 'multiple_choice'">

              <!-- <div v-if="SubQuestions.is_multy == 'text'" class="mcq p-3 " > -->
              <div v-if="SubQuestions.is_multy == 'text'" class="mcq p-3 "
                v-bind:class="[SubQuestions.color == 'b' ? 'bg-information' : '']">
                <div class="answers">
                  <ul class="multi-choice list-unstyled">
                    <h6>{{ SubQuestions.title }}</h6>
                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq' + index + 'a'"
                      v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, SubQuestions.first_choice, 'subq' + index + 'a', 'a', SubQuestions.answer_type)">
                      <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                      <label class="multi-label" id="mars">{{ SubQuestions.first_choice }}</label>
                    </li>
                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq' + index + 'b'"
                      v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, SubQuestions.second_choice, 'subq' + index + 'b', 'b', SubQuestions.answer_type)">
                      <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter">
                      <label class="multi-label" id="jupiter">{{ SubQuestions.second_choice }}</label>
                    </li>
                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq' + index + 'c'"
                      v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, SubQuestions.third_choice, 'subq' + index + 'c', 'c', SubQuestions.answer_type)">
                      <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus" />
                      <label class="multi-label" id="venus">{{ SubQuestions.third_choice }}</label>
                    </li>
                  </ul>
                </div>
              </div>

              <div v-if="SubQuestions.is_multy == 'image'" class="mcq mt-5">
                <!-- <h6>question question question question question question question question ?</h6> -->
                <ul class="multi-choice list-unstyled p-2">
                  <p>{{ SubQuestions.title }}</p>
                  <div class="row">
                    <div class="col-sm-6 ">
                      <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1 text-center"
                        :id="'subq' + index + 'image_a'"
                        v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, 'A', 'subq' + index + 'image_a', 'image_a', SubQuestions.answer_type)">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                        <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a"
                            class="img-fluid multi-label-img" alt=""></label>
                      </li>
                    </div>
                    <div class="col-sm-6 ">
                      <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center"
                        :id="'subq' + index + 'image_b'"
                        v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, 'B', 'subq' + index + 'image_b', 'image_b', SubQuestions.answer_type)">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                        <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b"
                            class="img-fluid  multi-label-img" alt=""></label>
                      </li>
                    </div>

                  </div>
                </ul>
              </div>

            </div>

            <!-- true_false -->
            <div v-if="SubQuestions.answer_type == 'true_false'"
              v-bind:class="[SubQuestions.color == 'b' ? 'bg-information' : '']">




              <div class="true-false p-3">
                <ul class="multi-choice list-unstyled p-2 d-flex flex-column flex-md-row align-items-start align-items-md-center">
                  <!-- السؤال -->
                  <h6 class="w-100 mb-2 mb-md-0 mr-md-4">
                    {{ SubQuestions.title }}
                  </h6>
                  <!-- الاختيارات -->
                  <div class="d-flex">
                    <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-3"
                      :id="'subq' + index + 'a'"
                      v-on:click="dissapear(
                        index,
                        item.exam_id,
                        SubQuestions.question_id,
                        SubQuestions.id,
                        SubQuestions.expected_answer,
                        SubQuestions.first_choice,
                        'subq' + index + 'a',
                        'a',
                        SubQuestions.answer_type
                      )">
                      <input class="multi-input d-none" type="radio" name="q-2" value="true">
                      <label class="multi-label">
                        {{ SubQuestions.first_choice }}
                      </label>
                    </li>

                    <li
                      class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3"
                      :id="'subq' + index + 'b'"
                      v-on:click="dissapear(
                        index,
                        item.exam_id,
                        SubQuestions.question_id,
                        SubQuestions.id,
                        SubQuestions.expected_answer,
                        SubQuestions.second_choice,
                        'subq' + index + 'b',
                        'b',
                        SubQuestions.answer_type
                      )"
                    >
                      <input class="multi-input d-none" type="radio" name="q-2" value="false">
                      <label class="multi-label">
                        {{ SubQuestions.second_choice }}
                      </label>
                    </li>

                  </div>

                </ul>
              </div>









              <!-- <div class="true-false p-3 ">
                <ul class="multi-choice list-unstyled p-2 d-flex  ">
                  <h6 class="w-100">{{ SubQuestions.title }} </h6>
                  <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :id="'subq' + index + 'a'"
                    v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, SubQuestions.first_choice, 'subq' + index + 'a', 'a', SubQuestions.answer_type)">
                    <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                    <label class="multi-label" id="true"> {{ SubQuestions.first_choice }}</label>
                  </li>
                  <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2" :id="'subq' + index + 'b'"
                    v-on:click="dissapear(index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer, SubQuestions.second_choice, 'subq' + index + 'b', 'b', SubQuestions.answer_type)">
                    <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                    <label class="multi-label" id="false">{{ SubQuestions.second_choice }}</label>
                  </li>

                </ul>
              </div> -->
              <div v-if="SubQuestions.bannarImage != null" class="picture multi-item  pl-5">
                <img :src="SubQuestions.bannarImage" alt="bannar image" class="img-fluid ">
              </div>
            </div>
            <!-- complete -->
            <div v-if="SubQuestions.answer_type == 'complete'">
              <div v-if="SubQuestions.is_complete == 'write'" class="dropdown d-flex justify-content-between mt-3">
                <!-- <input type="text"  @input="CompleteWrite($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)" /> -->

                <div v-if="SubQuestions.answer_location == 'beginning'" class="d-flex">
                  <input type="text"
                    @input="CompleteWrite($event, index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer)"
                    style="border:none; outline:none;min-width:200px; padding:0px 10px"
                    placeholder=" ...................................... ">
                  <span> {{ SubQuestions.title }} </span>
                  <span> {{ SubQuestions.last_title }} </span>
                </div>

                <div v-if="SubQuestions.answer_location == 'middle'" class="d-flex">
                  <span> {{ SubQuestions.title }} </span>
                  <input type="text"
                    @input="CompleteWrite($event, index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer)"
                    style="border:none; outline:none;min-width:200px; padding:0px 10px"
                    placeholder=" ........................................ ">
                  <span> {{ SubQuestions.last_title }} </span>
                </div>

                <div v-if="SubQuestions.answer_location == 'end'" class="d-flex">
                  <span> {{ SubQuestions.title }} </span>

                  <span> {{ SubQuestions.last_title }} </span>
                  <input
                    @input="CompleteWrite($event, index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer)"
                    type="text" style="border:none; outline:none;min-width:200px; padding:0px 10px"
                    placeholder=" ......................................... ">
                </div>
              </div>
              <div v-if="SubQuestions.answer != null" class="dropdown d-flex justify-content-between mt-3">
                <label for="cars">{{ SubQuestions.title }}</label>
                <select
                  @change="onChange($event, index, item.exam_id, SubQuestions.question_id, SubQuestions.id, SubQuestions.expected_answer)"
                  id="cars">
                  <option selected value=""> wählen </option>
                  <option :value="SubQuestions.answer.one">{{ SubQuestions.answer.one }}</option>
                  <option :value="SubQuestions.answer.two">{{ SubQuestions.answer.two }}</option>
                  <option :value="SubQuestions.answer.three">{{ SubQuestions.answer.three }}</option>
                  <option :value="SubQuestions.answer.four">{{ SubQuestions.answer.four }}</option>
                  <option :value="SubQuestions.answer.five">{{ SubQuestions.answer.five }}</option>
                  <option :value="SubQuestions.answer.six">{{ SubQuestions.answer.six }}</option>
                  <option :value="SubQuestions.answer.seven">{{ SubQuestions.answer.seven }}</option>
                  <option :value="SubQuestions.answer.eight">{{ SubQuestions.answer.eight }}</option>
                  <option :value="SubQuestions.answer.nine">{{ SubQuestions.answer.nine }}</option>
                  <option :value="SubQuestions.answer.ten">{{ SubQuestions.answer.ten }}</option>
                  <option :value="SubQuestions.answer.eleven">{{ SubQuestions.answer.eleven }}</option>
                  <option :value="SubQuestions.answer.twelve">{{ SubQuestions.answer.twelve }}</option>
                  <option :value="SubQuestions.answer.thirteen">{{ SubQuestions.answer.thirteen }}</option>
                  <option :value="SubQuestions.answer.fourteen">{{ SubQuestions.answer.fourteen }}</option>
                  <option :value="SubQuestions.answer.fifteen">{{ SubQuestions.answer.fifteen }}</option>
                  <option :value="SubQuestions.answer.sixteen">{{ SubQuestions.answer.sixteen }}</option>
                </select>
              </div>
            </div>


          </div>
        </div>
      </section>
      <section>
        <div class="next mt-5 mb-5">
          <h3 class="mb-5 border-raduis back text-light m-auto text-center p-2">
            <button type="submit" @click.prevent="SaveQuestion"
              style="background: #3e83b3;border: #3e83b3 0px solid !important;color: #fff;">

              Nächster Teil
            </button>
          </h3>
          <!-- <button type="submit" @click.prevent="nextQuestion" class="btn btn-outline-primary-2">
                <span>LOG IN </span>
                <i class="icon-long-arrow-right"></i>
              </button> -->
          <!-- <button type="submit" @click.prevent="SaveQuestion" class="btn btn-outline-primary-2">
              </button> -->
        </div>
      </section>
      <!--  -->
      <br />
    </div>

  </div>
</template>
<script>

import swal from "sweetalert";
export default {

  data() {
    return {
      userId: this.$store.state.userIdNumber,
      examId: this.$route.params.id,
      pageId: '1',
      qnum: -0,
      questionAnswer: [],
      names: [],
      // arr : [
      //   { id: '01', name: 'John', email: 'john@email.com' },
      //   { id: '02', name: 'Sara', email: 'sara@email.com' },
      //   { id: '03', name: 'Michael', email: 'michael@email.com' },
      // ]

    }
  },
  computed: {

    getQuestion() {
      return this.$store.state.questions
    },
    getCurrentPage() {
      return this.$store.state.CurrentPage
    }

  },
  mounted() {
    // let {examId} = this;
    // this.scrollToTop();
    this.$store.dispatch('getQuestions', { 
      examId: this.examId,
      pageId: this.pageId
    }).then(() => {
      this.$nextTick(() => {
        window.scrollTo(0, 0)
      })
    });
  },


  methods: {
    CompleteWrite(event, index, examId, questionId, subQuestionId, expected_answer) {
      console.log(event.target.value);
      let sub_q_ans;
      if (this.userId) {
        sub_q_ans = { 'user_id': this.userId, 'answerid': event.target.value, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'expected_answer': expected_answer }
      } else {
        sub_q_ans = { 'user_id': 0, 'answerid': event.target.value, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'expected_answer': expected_answer }
      }

      if (this.names.includes(subQuestionId)) {
        this.$delete(this.names, index);
        this.$delete(this.questionAnswer, index);
        this.names.push(subQuestionId);
        this.questionAnswer.push(sub_q_ans);
      } else {
        this.names.push(subQuestionId);
        this.questionAnswer.push(sub_q_ans);
      }
      // console.log(  this.questionAnswer);
      console.log(sub_q_ans);
    },
    onChange(event, index, examId, questionId, subQuestionId, expected_answer) {
      let sub_q_ans;
      if (this.userId) {
        sub_q_ans = { 'user_id': this.userId, 'answerid': event.target.value, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'expected_answer': expected_answer }
      } else {
        sub_q_ans = { 'user_id': 0, 'answerid': event.target.value, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'expected_answer': expected_answer }

      }
      if (this.names.includes(subQuestionId)) {
        this.$delete(this.names, index);
        this.$delete(this.questionAnswer, index);
        this.names.push(subQuestionId);
        this.questionAnswer.push(sub_q_ans);
      } else {
        this.names.push(subQuestionId);
        this.questionAnswer.push(sub_q_ans);
      }
      // console.log(index+'mmmm');
      console.log(this.questionAnswer);
    },
    dissapear(index, examId, questionId, subQuestionId, expected_answer, answerId, subQuestionClass, aswerNum, answerType) {
      console.log(subQuestionId);
      let sub_q_ans;
      if (this.userId) {
        sub_q_ans = { user_id: this.userId, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'answerid': answerId, 'expected_answer': expected_answer }
      } else {
        sub_q_ans = { user_id: 0, 'examId': examId, 'questionId': questionId, 'subQuestionId': subQuestionId, 'answerid': answerId, 'expected_answer': expected_answer }
      }

      if (this.names.includes(subQuestionId)) {
        for (let i = 0; i < this.names.length; i++) {
          if (this.names[i] == subQuestionId) {
            this.$delete(this.names, i);
            this.$delete(this.questionAnswer, i);
            this.names.push(subQuestionId);
            this.questionAnswer.push(sub_q_ans);
          }
        }
      } else {
        this.names.push(subQuestionId);
        this.questionAnswer.push(sub_q_ans);
      }


      if (aswerNum == 'a') {
        let answera = this.$el.querySelector("#" + subQuestionClass);
        answera.style.color = '#fff';
        answera.style.background = '#3e83b3';
        // answera.style.border="2px solid #3d83b3"
        let answerb = this.$el.querySelector("#subq" + index + 'b');
        answerb.style.color = '';
        answerb.style.background = '';
        if (answerType == 'multiple_choice') {
          let answerc = this.$el.querySelector("#subq" + index + 'c');
          answerc.style.color = '';
          answerc.style.background = '';
        }
      }
      if (aswerNum == 'b') {
        let answera = this.$el.querySelector("#subq" + index + 'a');
        answera.style.color = '';
        answera.style.background = '';

        let answerb = this.$el.querySelector("#" + subQuestionClass);
        answerb.style.color = '#fff';
        answerb.style.background = '#3e83b3';
        // answerb.style.border="2px solid #3d83b3"
        if (answerType == 'multiple_choice') {
          let answerc = this.$el.querySelector("#subq" + index + 'c');
          answerc.style.color = '';
          answerc.style.background = '';
        }
      }
      if (aswerNum == 'c') {


        let answera = this.$el.querySelector("#subq" + index + 'a');
        answera.style.color = '';
        answera.style.background = '';

        let answerb = this.$el.querySelector("#subq" + index + 'b');
        answerb.style.color = '';
        answerb.style.background = '';

        let answerc = this.$el.querySelector("#" + subQuestionClass);
        answerc.style.color = '#fff';
        answerc.style.background = '#3e83b3';
        // answerc.style.border="2px solid #3d83b3"
      }

      if (aswerNum == 'image_a') {
        let answera = this.$el.querySelector("#" + subQuestionClass);
        answera.style.color = '#fff';
        // answera.style.background = '#3e83b3';
        answera.style.border = '';
        // answera.style.border-radius='';
        answera.style.border = "2px solid #3d83b3";
        let answerb = this.$el.querySelector("#subq" + index + 'image_b');
        answerb.style.color = '';
        answerb.style.background = '';
        answerb.style.border = '';
      }
      if (aswerNum == 'image_b') {
        let answera = this.$el.querySelector("#subq" + index + 'image_a');
        answera.style.color = '';
        answera.style.background = '';
        answera.style.border = '';
        let answerb = this.$el.querySelector("#" + subQuestionClass);
        answerb.style.color = '#fff';
        // answerb.style.background = '#3e83b3';
        answerb.style.border = "2px solid #3d83b3"
      }

    },

    // nextQuestion(){
    //   let nextpage=2;
    //   console.log(nextpage);
    //   this.$store.dispatch('getQuestions', { examId: this.examId,pageId:this.getCurrentPage+1 });
    // },

    SaveQuestion() {
      if (this.questionAnswer.length == 0) {
        this.$toaster.error(this.$t('youMustAnswer'));

        // swal({
        //     text: "User signup successful, please login",
        //     icon: "error",
        //     title: 'Your work has been saved',
        //     timer: 2500
        //   });
      } else {
        let data = { 'data': this.questionAnswer };
        axios.post('https://deutschtests.com/api/save-exam', data)
          .then(res => {
            console.log(res)
            commit('setUserToken', res.data.token)
          })
          .catch(err => {
            console.log(err)
          })
        this.names = [];
        this.questionAnswer = [];
        console.log(this.getCurrentPage + 1 + ' page');
        if (this.userId) {
          this.$store.dispatch('getQuestions', { user_id: this.$store.state.userIdNumber, examId: this.examId, pageId: this.getCurrentPage + 1 });
        } else {
          this.$toaster.error(this.$t('YouMustRegister'));
          this.$store.dispatch('getQuestions', { user_id: 0, examId: this.examId, pageId: this.getCurrentPage + 1 });
        }
        window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
      }
    },

  }

}
</script>
<style>
  .questions .main-text,.questions .main-quiz {
      height: auto !important;
  }

@media (min-width: 992px) {
    .questions .main-text,
    .questions .main-quiz {
        max-height: 100vh;
        overflow-y: auto;
    }
}
</style>