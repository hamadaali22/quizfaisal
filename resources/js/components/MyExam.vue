<template>
  <div>
    <div  class="mcq p-3 ">
      <div class="answers">
        <ul class="multi-choice list-unstyled">
          <h6>{{questionsitem.title}} {{examId}}</h6>


                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1 hamada1"  >
                      <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars"  >
                      <label  class="multi-label" for="mars" id="mars">{{questionsitem.first_choice}}</label>
                    </li>
                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                      <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                      <label class="multi-label" for="jupiter" id="jupiter">{{questionsitem.second_choice}}</label>
                    </li>
                    <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" >
                      <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus">
                      <label class="multi-label" for="venus" id="venus">{{questionsitem.third_choice}}</label>
                    </li>

      </ul>
    </div>
  </div>

</div>
</template>
<script>

export default {
  props: ["questionsitem","examId"],
  data(){
    return {

    }
  },
  created() {
      console.log(this.$store.state.userToken);
      console.log('fffffjfjfjfjfjnnnn');


  },
  mounted() {
    let q1= document.querySelectorAll(".q-1")
    choose(q1)
    let q2= document.querySelectorAll(".q-2")
    choose(q2)
    let q3= document.querySelectorAll(".q-3")
    choose(q3)
    let q4= document.querySelectorAll(".q-4")
    choose(q4)
    let q5= document.querySelectorAll(".q-5")
    choose(q5)
    let q6= document.querySelectorAll(".q-6")
    choose(q6)
    let q7= document.querySelectorAll(".q-7")
    choose(q7)
    let q8= document.querySelectorAll(".q-8")
    choose(q8)
    let q9= document.querySelectorAll(".q-9")
    choose(q9)
    let q10= document.querySelectorAll(".q-10")
    choose(q10)
    function choose(answers){
        answers.forEach((item)=>{
            item.onclick=function(){
                item.children[1].click()
                answers.forEach((item)=>{
                    item.style.backgroundColor="unset"
                    item.style.color="#000"

                })
                item.style.backgroundColor="#3d83b3"
                item.style.color="#fff"
            }
        })
    }
  },


}
</script>
