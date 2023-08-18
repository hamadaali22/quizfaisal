<template>
  <div>
    <div v-for="(_item, index) in SubQuestions.subquestion" :key="_item.id">
      <div  v-if="_item.answer_type == 'multiple_choice'">
        <SubQuestionMultipleChoice :SubQuestions="_item" :SubQuestionsIndex="index"></SubQuestionMultipleChoice>
      </div>
      <div  v-else-if="_item.answer_type == 'true_false'">
        <SubQuestionTrueFalse :SubQuestions="_item" :SubQuestionsIndex="index"></SubQuestionTrueFalse>
      </div>
      <div  v-else="_item.answer_type == 'complete'">
        <SubQuestionComplete :SubQuestions="_item" :SubQuestionsIndex="index"></SubQuestionComplete>
      </div>
    </div>
  </div>
</template>

<script>
import SubQuestionMultipleChoice from './SubQuestionMultipleChoice.vue';
import SubQuestionTrueFalse from './SubQuestionTrueFalse.vue';
import SubQuestionComplete from './SubQuestionComplete.vue';
// import db from '@/firebaseInit';
// npm install -g firebase-tools
export default {
  name: 'ProductHome',
  props: ["SubQuestions"],
  components: {
    SubQuestionMultipleChoice,
    SubQuestionTrueFalse,
    SubQuestionComplete,
  },
  created() {
    //do something after creating vue instance
    // console.log('hamada!');
    // db.collection('User')
    //   .onSnapshot(snapshot=>{
    //     snapshot.docChanges().forEach(change=>{
    //       let doc = change.doc
    //       console.log('changed!');
    //
    //     })
    //   })
  }
}
</script>
