<template>
  <div>

    <a href="hamada"></a>
    <div v-for="item in GoetheReportExam" :key="item.id">
      <section class="row bg-white m-2 p-1 " >
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
            <audio controls class="align-items-center w-50"   controlsList="nodownload">
              <source :src="item.file" type="audio/ogg">
                <source :src="item.file" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
              <div class="col-2"></div>
          </div>
        </section>
        <section class="questions  row m-2 p-1">
            <div v-if="(item.type != 'listening') && (item.type != 'sub')"  class="col-lg-7 main-text col-md-8 mt-md-3 ml-md-auto mr-md-auto p-2 mt-3 mr-lg-2 bg-white">
              <!-- <h2>Title</h2>
              <h5>Sub Title Sub Title Sub Title</h5> -->

              <p v-if="item.type == 'reading'" v-html="item.paragraph"> </p>
              <img v-if="item.type == 'image'" :src="item.image" >
              <img v-if="item.type == 'listening and image'" :src="item.image" >
            </div>
            <div  class="col-lg main-quiz col-md-8 ml-md-auto mr-md-auto pr-2 pl-2 mt-3 text-left bg-white">
              <!-- <SubQuestions :SubQuestions="item" ></SubQuestions> -->

              <div v-for=" (SubQuestions, index) in item.subquestion" :key="SubQuestions.id">
                  <!-- multiple_choice -->
                <div  v-if="SubQuestions.answer_type == 'multiple_choice'">

                  <!-- <div v-if="SubQuestions.is_multy == 'text'" class="mcq p-3 " > -->
                  <div v-if="SubQuestions.is_multy == 'text'" class="mcq p-3 " v-bind:class="[SubQuestions.color == 'b'  ? 'bg-information' : '']">
                      <div class="answers">
                        <ul class="multi-choice list-unstyled" v-if="SubQuestions.exam_answer !=null">
                          <h6>{{SubQuestions.title}}</h6>

                      <!-- first -->
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-if="SubQuestions.first_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.first_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if=" SubQuestions.first_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.first_choice == SubQuestions.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.first_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.first_choice != SubQuestions.exam_answer.expected_answer" :style="'background: #f6bfc4'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else>
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>
                    <!-- end -->
                    <!-- second -->
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                            <label class="multi-label"  id="jupiter">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                            <label class="multi-label"  id="jupiter">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.second_choice == SubQuestions.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                            <label class="multi-label"  id="jupiter">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice != SubQuestions.exam_answer.expected_answer" :style="'background: #f6bfc4'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else>
                            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                            <label class="multi-label"  id="jupiter">{{SubQuestions.second_choice}}</label>
                          </li>
                  <!-- end -->
                  <!-- third -->
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-if="SubQuestions.third_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.third_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'"  >
                            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
                            <label class="multi-label"  id="venus">{{SubQuestions.third_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.third_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.third_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'" >
                            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
                            <label class="multi-label"  id="venus">{{SubQuestions.third_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.third_choice == SubQuestions.expected_answer" :style="'background: #28D094'" >
                            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
                            <label class="multi-label"  id="venus">{{SubQuestions.third_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else-if="SubQuestions.third_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.third_choice != SubQuestions.exam_answer.expected_answer" :style="'background: #f6bfc4'">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.third_choice}}</label>
                          </li>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1" v-else>
                            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
                            <label class="multi-label"  id="venus">{{SubQuestions.third_choice}}</label>
                          </li>
                  <!--  -->
                        </ul>
                        <ul class="multi-choice list-unstyled" v-else>
                          <h6>{{SubQuestions.title}}</h6>
                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                            <label  class="multi-label"  id="mars">{{SubQuestions.first_choice}}</label>
                          </li>

                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter" >
                            <label class="multi-label"  id="jupiter">{{SubQuestions.second_choice}}</label>
                          </li>

                          <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                            <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus"  />
                            <label class="multi-label"  id="venus">{{SubQuestions.third_choice}}</label>
                          </li>

                        </ul>
                      </div>
                  </div>

                  <div  v-if="SubQuestions.is_multy == 'image'" class="mcq mt-5">
                      <!-- <h6>question question question question question question question question ?</h6> -->
                      <ul class="multi-choice list-unstyled p-2"  v-if="SubQuestions.exam_answer !=null">
                          <p>{{SubQuestions.title}}</p>
                          <div class="row">
                        <!-- first imag -->
                            <div class="col-sm-6 " v-if="'a' == SubQuestions.exam_answer.answer
                                                                            && 'a' == SubQuestions.exam_answer.expected_answer" >
                              <li class="mr-2 multi-item q-9  pt-2 pl-3 mb-1 text-center" style="border: #28D094 1px solid;">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                                  <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a" class="img-fluid multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6" v-else-if=" 'a' == SubQuestions.exam_answer.expected_answer" >
                              <li class="mr-2 multi-item q-9  pt-2 pl-3 mb-1 text-center" style="border: #28D094 1px solid;">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                                  <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a" class="img-fluid multi-label-img" alt=""></label>
                              </li>
                            </div>


                            <div class="col-sm-6" v-else-if="'a' == SubQuestions.exam_answer.answer
                                                                            && 'a' != SubQuestions.exam_answer.expected_answer" >
                              <li class="mr-2 multi-item q-9   pt-2 pl-3 mb-1 text-center"  style="border: #f6bfc4 1px solid;">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                                  <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a" class="img-fluid multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6 " v-else>
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1 text-center" >
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                                  <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a" class="img-fluid multi-label-img" alt=""></label>
                              </li>
                            </div>


                      <!-- end -->
                      <!-- start b-->
                            <div class="col-sm-6 " v-if="'b' == SubQuestions.exam_answer.answer
                                                                            && 'b' == SubQuestions.exam_answer.expected_answer">
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center" style="border: #28D094 1px solid;">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                                  <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b" class="img-fluid  multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6 " v-else-if=" 'b' == SubQuestions.exam_answer.expected_answer" style="border: #28D094 1px solid;">
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center" >
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                                  <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b" class="img-fluid  multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6 " v-else-if="'b' == SubQuestions.exam_answer.answer
                                                                            && 'b' != SubQuestions.exam_answer.expected_answer" >
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center" style="border: #f6bfc4 1px solid;">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                                  <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b" class="img-fluid  multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6 " v-else>
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center" >
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                                  <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b" class="img-fluid  multi-label-img" alt=""></label>
                              </li>
                            </div>
                    <!-- end -->
                          </div>
                      </ul>
                      <ul class="multi-choice list-unstyled p-2" v-else>
                          <p>{{SubQuestions.title}}</p>
                          <div class="row">
                            <div class="col-sm-6 ">
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1 text-center" :id="'subq'+index+'image_a'" v-on:click="dissapear(index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer,'a','subq'+index+'image_a','image_a',SubQuestions.answer_type)">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                                  <label class="multi-label" id="mars">A.<img :src="SubQuestions.image_a" class="img-fluid multi-label-img" alt=""></label>
                              </li>
                            </div>
                            <div class="col-sm-6 ">
                              <li class="mr-2 multi-item q-9  border-raduis pt-2 pl-3 mb-1  text-center" :id="'subq'+index+'image_b'" v-on:click="dissapear(index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer,'b','subq'+index+'image_b','image_b',SubQuestions.answer_type)">
                                  <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                                  <label class="multi-label" id="jupiter">B.<img :src="SubQuestions.image_b" class="img-fluid  multi-label-img" alt=""></label>
                              </li>
                            </div>

                          </div>
                      </ul>
                  </div>

                </div>

                <!-- true_false -->
                  <div  v-if="SubQuestions.answer_type == 'true_false'" v-bind:class="[SubQuestions.color == 'b'  ? 'bg-information' : '']">
                      <div class="true-false p-3 ">
                        <ul class="multi-choice list-unstyled p-2 d-flex " v-if="SubQuestions.exam_answer !=null">

                          <h6 class="w-100">{{SubQuestions.title}} </h6>
                    <!-- first true_false -->
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.first_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.first_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if=" SubQuestions.first_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.first_choice == SubQuestions.expected_answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.first_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.first_choice != SubQuestions.exam_answer.expected_answer" :style="'background: #f6bfc4'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else>
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                      <!-- end  -->
                      <!-- second true_false -->
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2"  v-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2"  v-else-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice == SubQuestions.exam_answer.expected_answer" :style="'background: #28D094'">
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2"  v-else-if="SubQuestions.second_choice == SubQuestions.expected_answer" :style="'background: #28D094'">
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2"  v-else-if="SubQuestions.second_choice == SubQuestions.exam_answer.answer
                                                                          && SubQuestions.second_choice != SubQuestions.exam_answer.expected_answer" :style="'background: #f6bfc4'">
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2" v-else>
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>
                     <!-- end  -->
                        </ul>
                        <ul class="multi-choice list-unstyled p-2 d-flex " v-else>

                          <h6 class="w-100">{{SubQuestions.title}} </h6>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :id="'subq'+index+'a'" v-on:click="dissapear(index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer,SubQuestions.first_choice,'subq'+index+'a','a',SubQuestions.answer_type)">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.first_choice}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2" :id="'subq'+index+'b'" v-on:click="dissapear(index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer,SubQuestions.second_choice,'subq'+index+'b','b',SubQuestions.answer_type)">
                            <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                            <label class="multi-label"  id="false">{{SubQuestions.second_choice}}</label>
                          </li>

                        </ul>
                      </div>
                      <div v-if="SubQuestions.bannarImage != null"  class="picture multi-item  pl-5">
                        <img   :src="SubQuestions.bannarImage" alt="bannar image" class="img-fluid ">
                    </div>
                  </div>
              <!-- complete -->
                <div  v-if="SubQuestions.answer_type == 'complete'">
                    <div v-if="SubQuestions.is_complete == 'write'" class="dropdown d-flex justify-content-between mt-3">
                      <!-- <input type="text"  @input="CompleteWrite($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)" /> -->

                        <div v-if="SubQuestions.answer_location == 'beginning'" class=" list-unstyled">
                          <input type="text"  @input="CompleteWrite($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)"  style="border:none; outline:none;min-width:200px; padding:0px 10px" placeholder=" ...................................... ">
                          <span> {{SubQuestions.title}} </span>
                          <span> {{SubQuestions.last_title}} </span>
                          <span v-if="SubQuestions.exam_answer !=null" >
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5 " v-if="SubQuestions.expectedanswer.one == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.two == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.three == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.four == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.five == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.six == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <span v-else class="d-flex list-unstyled">
                                <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #f6bfc4'">
                                  <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                  <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                                </li>
                                <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #28D094'">
                                  <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                  <label class="multi-label"  id="true"> {{SubQuestions.expectedanswer.one}}</label>
                                </li>
                            </span>
                          </span>

                        </div>

                        <div v-if="SubQuestions.answer_location == 'middle'" class="list-unstyled">
                          <span> {{SubQuestions.title}} </span>
                          <input type="text" @input="CompleteWrite($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)"  style="border:none; outline:none;min-width:200px; padding:0px 10px" placeholder=" ........................................ ">
                          <span> {{SubQuestions.last_title}} </span>

                          <span v-if="SubQuestions.exam_answer !=null" >
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5 " v-if="SubQuestions.expectedanswer.one == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.two == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.three == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.four == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.five == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.six == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                              <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                              <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                            </li>
                            <span v-else class="d-flex list-unstyled">
                                <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #f6bfc4'">
                                  <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                  <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                                </li>
                                <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #28D094'">
                                  <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                  <label class="multi-label"  id="true"> {{SubQuestions.expectedanswer.one}}</label>
                                </li>
                            </span>
                          </span>

                        </div>

                        <div v-if="SubQuestions.answer_location == 'end'" class=" list-unstyled">
                          <span> {{SubQuestions.title}} </span>
                          <span> {{SubQuestions.last_title}} </span>
                            <input  @input="CompleteWrite($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)" type="text" style="border:none; outline:none;min-width:200px; padding:0px 10px" placeholder=" ......................................... ">
                            <span v-if="SubQuestions.exam_answer !=null" >
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5 " v-if="SubQuestions.expectedanswer.one == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.two == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.three == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.four == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.five == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <li  class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-else-if="SubQuestions.expectedanswer.six == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                                <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                              </li>
                              <span v-else class="d-flex list-unstyled">
                                  <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #f6bfc4'">
                                    <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                    <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                                  </li>
                                  <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" :style="'background: #28D094'">
                                    <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                                    <label class="multi-label"  id="true"> {{SubQuestions.expectedanswer.one}}</label>
                                  </li>
                              </span>
                            </span>

                        </div>
                    </div>
                    <div v-if="SubQuestions.answer != null " class="multi-choice list-unstyled p-2   ">
                        <label for="cars">{{SubQuestions.title}}</label>
                        <span v-if="SubQuestions.exam_answer !=null" class="d-flex">
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.expected_answer == SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.expected_answer}}</label>
                          </li>
                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.expected_answer != SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.expected_answer}}</label>
                          </li>

                          <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.expected_answer != SubQuestions.exam_answer.answer" :style="'background: #f6bfc4'">
                            <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                            <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                          </li>
                        </span>
                        <span v-else>
                            <p class="multi-label"  id="true"></p>
                        </span>

                        <!-- <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.expected_answer != SubQuestions.exam_answer.answer" :style="'background: #28D094'">
                          <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                          <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.expected_answer}}</label>
                        </li>

                        <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5" v-if="SubQuestions.expected_answer != SubQuestions.exam_answer.answer" :style="'background: #f6bfc4'">
                          <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                          <label class="multi-label"  id="true"> {{SubQuestions.exam_answer.answer}}</label>
                        </li> -->

                       <!-- <select  @change="onChange($event,index,item.exam_id,SubQuestions.question_id,SubQuestions.id,SubQuestions.expected_answer)"  id="cars" >
                          <option selected value=""> wählen </option>
                          <option  :value="SubQuestions.answer.one">{{SubQuestions.answer.one}}</option>
                          <option :value="SubQuestions.answer.two">{{SubQuestions.answer.two}}</option>
                          <option :value="SubQuestions.answer.three">{{SubQuestions.answer.three}}</option>
                          <option :value="SubQuestions.answer.four">{{SubQuestions.answer.four}}</option>
                          <option :value="SubQuestions.answer.five">{{SubQuestions.answer.five}}</option>
                          <option :value="SubQuestions.answer.six">{{SubQuestions.answer.six}}</option>
                          <option :value="SubQuestions.answer.seven">{{SubQuestions.answer.seven}}</option>
                          <option :value="SubQuestions.answer.eight">{{SubQuestions.answer.eight}}</option>
                          <option :value="SubQuestions.answer.nine">{{SubQuestions.answer.nine}}</option>
                          <option :value="SubQuestions.answer.ten">{{SubQuestions.answer.ten}}</option>
                          <option :value="SubQuestions.answer.eleven">{{SubQuestions.answer.eleven}}</option>
                          <option :value="SubQuestions.answer.twelve">{{SubQuestions.answer.twelve}}</option>
                          <option :value="SubQuestions.answer.thirteen">{{SubQuestions.answer.thirteen}}</option>
                          <option :value="SubQuestions.answer.fourteen">{{SubQuestions.answer.fourteen}}</option>
                          <option :value="SubQuestions.answer.fifteen">{{SubQuestions.answer.fifteen}}</option>
                          <option :value="SubQuestions.answer.sixteen">{{SubQuestions.answer.sixteen}}</option>
                       </select> -->
                   </div>
                </div>


              </div>
            </div>
        </section>
          <section>
            <div class="next mt-5 mb-5">
              <h3 class="mb-5 border-raduis back text-light m-auto text-center p-2">
                  <button type="submit" @click.prevent="getQuestion" style="background: #3e83b3;border: #3e83b3 0px solid !important;color: #fff;" >

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
          <br />
        </div>

      </div>
    </template>
    <style>
      .isAnswerRight{
          background-color: #28D094;
      }
      .isAnswerNotRight{
          background-color: #f6bfc4;
      }

    </style>
    <script>

  import swal from "sweetalert";
    export default {

      data(){
        return {
          userId:this.$store.state.userToken.id,
          examId:this.$route.params.id,
          pageId:'1',
          // qnum:-0,
          questionAnswer:[],

        }
      },
      computed:{
        GoetheReportExam(){
          return this.$store.state.GoetheReportExam
        },
        // getQuestion(){
        //   return this.$store.state.questions
        // },
        getCurrentPage(){
          return this.$store.state.CurrentPage
        }

      },
      mounted(){
        // let {examId} = this;
        // this.scrollToTop();
        this.$store.dispatch('getGoetheReportExams', { userId: this.userId,examId: this.examId,pageId:this.pageId });
      },


      methods: {
        getQuestion(){
              // if(this.questionAnswer.length == 0){
              //   this.$toaster.error('Sie müssen mindestens eine Frage beantworten.');
              // }else{

                this.questionAnswer=[];
                // console.log(this.getCurrentPage+1+' page');
                this.$store.dispatch('getGoetheReportExams', {userId: this.$store.state.userToken.id, examId: this.examId,pageId:this.getCurrentPage+1 });
                window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
              // }
        },
      }

  }
</script>
