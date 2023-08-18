<template>
  <div>
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <!-- <h6>{{SubQuestions.title}} </h6> -->
          <!-- <h1 v-for="exam in my2" >{{exam.answerid }}</h1> -->
          <h6>{{SubQuestions.title}} {{SubQuestionsIndex}}</h6>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+SubQuestionsIndex+'a'" v-on:click="dissapear(SubQuestionsIndex,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.first_choice,'subq'+SubQuestionsIndex+'a','a')"  >
            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars"  >
            <label  class="multi-label" for="mars" id="mars">{{SubQuestions.first_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+SubQuestionsIndex+'b'" v-on:click="dissapear(SubQuestionsIndex,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.second_choice,'subq'+SubQuestionsIndex+'b','b')" >
            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
            <label class="multi-label" for="jupiter" id="jupiter">{{SubQuestions.second_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+SubQuestionsIndex+'c'" v-on:click="dissapear(SubQuestionsIndex,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.third_choice,'subq'+SubQuestionsIndex+'c','c')" >
            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
            <label class="multi-label" for="venus" id="venus">{{SubQuestions.third_choice}}</label>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>

export default {

  data(){
    return {
       my2:[],
       names : [],
    }
  },
  props: ["SubQuestions","SubQuestionsIndex"],
  methods:{
    dissapear (index,examId,questionId,subQuestionId,answerId,subQuestionClass,type) {
        // console.log("index =>" +index +" type => "+type+ " subQuestionClass =>"+subQuestionClass );
        let sub_q_ans={ 'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId }

        if(this.names.includes(subQuestionId)){
             console.log("Value Exist");
        }else{
            this.names.push(subQuestionId);
            this.my2.push(sub_q_ans);
        }
        console.log(this.names.length +"ff");
        if(type =='a'){
          // subq0a,subq0b,subq0c,
          // subq1a,subq1b,subq1c,
          // subq2a,subq2b,subq2c,
              let answera = this.$el.querySelector("#"+subQuestionClass);
                answera.style.color = '#fff';
                answera.style.background = '#3e83b3';

              let answerb = this.$el.querySelector("#subq"+index+'b');
                  answerb.style.color = '';
                  answerb.style.background = '';

              let answerc = this.$el.querySelector("#subq"+index+'c');
                  answerc.style.color = '';
                  answerc.style.background = '';
        }
        if(type =='b'){
              let answera = this.$el.querySelector("#subq"+index+'a');
                answera.style.color = '';
                answera.style.background = '';

              let answerb = this.$el.querySelector("#"+subQuestionClass);
                  answerb.style.color = '#fff';
                  answerb.style.background = '#3e83b3';

              let answerc = this.$el.querySelector("#subq"+index+'c');
                  answerc.style.color = '';
                  answerc.style.background = '';
        }
        if(type =='c'){


              let answera = this.$el.querySelector("#subq"+index+'a');
                answera.style.color = '';
                answera.style.background = '';

                let answerb = this.$el.querySelector("#subq"+index+'b');
                    answerb.style.color = '';
                    answerb.style.background = '';

              let answerc = this.$el.querySelector("#"+subQuestionClass);
                  answerc.style.color = '#fff';
                  answerc.style.background = '#3e83b3';
        }
    },

  }
}
</script>
