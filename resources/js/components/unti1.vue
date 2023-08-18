<template>
  <div>
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <h1 v-for="exam in my2" >{{exam }}</h1>
          <h6>{{SubQuestions.title}} </h6>

          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-on:click="dissapear(1,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.first_choice)" v-bind:style="first_choice" >
            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars"  >
            <label  class="multi-label" for="mars" id="mars">{{SubQuestions.first_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-on:click="dissapear(2,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.second_choice)" v-bind:style="second_choice">
            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
            <label class="multi-label" for="jupiter" id="jupiter">{{SubQuestions.second_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-on:click="dissapear(3,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.third_choice)" v-bind:style="third_choice">
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
  mounted() {
    //
    // let q1= document.querySelectorAll(".q-1")
    // choose(q1)
    // let q2= document.querySelectorAll(".q-2")
    // choose(q2)
    // let q3= document.querySelectorAll(".q-3")
    // choose(q3)
    // let q4= document.querySelectorAll(".q-4")
    // choose(q4)
    // let q5= document.querySelectorAll(".q-5")
    // choose(q5)
    // let q6= document.querySelectorAll(".q-6")
    // choose(q6)
    // let q7= document.querySelectorAll(".q-7")
    // choose(q7)
    // let q8= document.querySelectorAll(".q-8")
    // choose(q8)
    // let q9= document.querySelectorAll(".q-9")
    // choose(q9)
    // let q10= document.querySelectorAll(".q-10")
    // choose(q10)
    // function choose(answers){
    //     answers.forEach((item)=>{
    //         item.onclick=function(){
    //             item.children[1].click()
    //             answers.forEach((item)=>{
    //                 item.style.backgroundColor="unset"
    //                 item.style.color="#000"
    //
    //             })
    //             item.style.backgroundColor="#3d83b3"
    //             item.style.color="#fff"
    //         }
    //     })
    // }
  },
  data(){
    return {
      the_answer: '',
       // classStyle: 'blue'
       first_choice: {},
       second_choice: {},
       third_choice: {},
        my2:[]
    }
  },
  props: ["SubQuestions"],
  methods:{
    dissapear (index,examId,questionId,subQuestionId,answerId) {


        this.my2.push(
                  { 'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId }
              );
        this.my2.push(
                        { 'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId }
                    );
        this.my2.push(
                              { 'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId }
                          );
          // if(this.my2.length == 0){
          //   this.my2.push(
          //       {'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId }
          //   );
          // }else{
          //   this.my2.forEach((item) => {
          //     if(item.subQuestionId != subQuestionId){
          //         console.log(subQuestionId);
          //         this.my2.push({'examId': examId,'questionId':questionId ,'subQuestionId':subQuestionId ,'answerid':answerId })
          //     }
          //   });
          // }
          console.log(this.my2.length);
        if(index ==1){
          this.the_answer=answerId;
          this.first_choice = {
                'background-color': '#3e83b3',
                'color':'#fff'
          };
        }
        if(index ==2){
          this.the_answer=answerId;
          this.second_choice = {
            'background-color': '#3e83b3',
            'color':'#fff'
          };
        }
        if(index ==3){
          this.the_answer=answerId;
          this.third_choice = {
                'background-color': '#3e83b3',
                'color':'#fff'
          };
        }
    }
  }
}
</script>







<!-- <div  v-if="item.answer_type == 'multiple_choice'"> -->
  <div v-for=" (SubQuestions, index) in item.subquestion" :key="SubQuestions.id">
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <h6>{{SubQuestions.title}} </h6>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+index+'a'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.first_choice,'subq'+index+'a','a')"  >
            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars"  >
            <label  class="multi-label" for="mars" id="mars">{{SubQuestions.first_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+index+'b'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.second_choice,'subq'+index+'b','b')">
            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
            <label class="multi-label" for="jupiter" id="jupiter">{{SubQuestions.second_choice}}</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" :id="'subq'+index+'c'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.third_choice,'subq'+index+'c','c')">
            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
            <label class="multi-label" for="venus" id="venus">{{SubQuestions.third_choice}}</label>
          </li>
        </ul>
      </div>
    </div>
</div>
<!-- </div> -->
<!-- true_false -->
<div  v-else-if="item.answer_type == 'true_false'">
  <div v-for=" (SubQuestions, index) in item.subquestion" :key="SubQuestions.id">
    <div class="true-false p-3 ">
      <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap ">
        <h6 class="w-100">{{SubQuestions.title}} </h6>
        <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :id="'subq'+index+'a'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.first_choice,'subq'+index+'a','a')">
          <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
          <label class="multi-label" for="true-1" id="true"> {{SubQuestions.first_choice}}</label>
        </li>
        <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2" :id="'subq'+index+'b'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.second_choice,'subq'+index+'b','b')">
          <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
          <label class="multi-label" for="false-1" id="false">{{SubQuestions.second_choice}}</label>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- complete -->
<div  v-else="item.answer_type == 'complete'">
  <div v-for=" (SubQuestions, index) in item.subquestion" :key="SubQuestions.id">
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <h6>{{SubQuestions.title}}</h6>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter">
            <label class="multi-label" for="jupiter" id="jupiter">B. Jupiter</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus">
            <label class="multi-label" for="venus" id="venus">C. Venus</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="saturn" id="saturn">
            <label class="multi-label" for="saturn" id="saturn">D. Saturn</label>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>













<!-- true_false -->
  <div  v-else-if="item.answer_type == 'true_false'">
    <div class="true-false p-3 ">
        <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap ">
          <h6 class="w-100">{{SubQuestions.title}} </h6>
          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :id="'subq'+index+'a'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.first_choice,'subq'+index+'a','a')">
            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
            <label class="multi-label" for="true-1" id="true"> {{SubQuestions.first_choice}}</label>
          </li>
          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2" :id="'subq'+index+'b'" v-on:click="dissapear(index,SubQuestions.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.second_choice,'subq'+index+'b','b')">
            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
            <label class="multi-label" for="false-1" id="false">{{SubQuestions.second_choice}}</label>
          </li>
        </ul>
      </div>
  </div>
<!-- complete -->
  <div  v-else="item.answer_type == 'complete'">
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <h6>{{SubQuestions.title}}</h6>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter">
            <label class="multi-label" for="jupiter" id="jupiter">B. Jupiter</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus">
            <label class="multi-label" for="venus" id="venus">C. Venus</label>
          </li>
          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
            <input class=" multi-input d-none" type="radio" name="q-1" value="saturn" id="saturn">
            <label class="multi-label" for="saturn" id="saturn">D. Saturn</label>
          </li>
        </ul>
      </div>
    </div>
</div>
