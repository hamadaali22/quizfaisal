<template>
  <div>



    <div class="true-false p-3 ">
      <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap ">
        <h6 class="w-100">{{SubQuestions.title}} </h6>
        <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5">
          <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
          <label class="multi-label" for="true-1" id="true"> {{SubQuestions.first_choice}}</label>
        </li>
        <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2">
          <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
          <label class="multi-label" for="false-1" id="false">{{SubQuestions.second_choice}}</label>
        </li>
      </ul>
    </div>
    <!-- <div class="mcq-true-false p-3 bg-information ">
      <div class="mcq  ">
        <div class="true-false">
          <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap">
            <h6 class="w-100">question question question question question question question question ?</h6>
            <li class="multi-item q-3 border border-raduis mr-5 pl-3 pr-3">
              <input class=" multi-input d-none" type="radio" name="q-3" value="true" id="true-2">
              <label class="multi-label" for="true-2" id="true"> true</label>
            </li>
            <li class="multi-item q-3 border border-raduis pl-3 pr-3 ml-2">
              <input class="multi-input d-none" type="radio" name="q-3" value="false" id="false-2">
              <label class="multi-label" for="false-2" id="false">false</label>
            </li>
          </ul>
        </div>

      </div>
    </div>
    <div class="true-false-picture p-3 bg-information mt-3">
      <div class="true-false p-3 ">
        <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap">
          <h6 class="w-100">question question question question question question question question ?</h6>
          <li class="multi-item q-5 border border-raduis pt-2 pl-3 pr-3 mb-1 mr-5">
            <input class=" multi-input d-none" type="radio" name="q-5" value="true" id="true-3">
            <label class="multi-label" for="true-3" id="true"> true</label>
          </li>
          <li class="multi-item q-5 border border-raduis pt-2 pl-3 pr-3 mb-1 ml-2">
            <input class="multi-input d-none" type="radio" name="q-5" value="false" id="false-3">
            <label class="multi-label" for="false-3" id="false">false</label>
          </li>
        </ul>
      </div>
      <div class="picture">
        <img src="front/img.jpg" class="img-fluid" alt="">
      </div>
    </div> -->



  </div>
</template>
<script>

export default {
  props: ["SubQuestions"],

}
</script>
