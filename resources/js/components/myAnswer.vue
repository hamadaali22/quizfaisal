<template>
    <div>
        <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto">
        <div v-for="item in goetheUserExams" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
          <router-link v-if="isLogged" :to="'/goethe-report/' + item.id" class="a-link">{{ item.name }}</router-link>
        </div>
        <div v-for="_item in telcUserExams" :key="_item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
          <router-link v-if="isLogged" :to="'/goethe-report/' + _item.id" class="a-link">{{ _item.name }}</router-link>
        </div>
      </div>
    </section>
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-area">
                            <h2 class="title-about">Ihr Fortschritt</h2>
                            <!-- <span class="line"></span> -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="single-service wow zoomIn" align="center">
                            <img src="front/Animation/Deutschtests.jpg" alt="Deutschtest" />
                        </div>
                    </div>




                    <div class="col-md-12">
                        <div class="col-md-2"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="our-skill">
                                <h4><strong>Lesen</strong></h4>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="our-skill">
                                <h4><strong>Hören</strong></h4>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div v-for="item in goetheUserExams" :key="item.id" class="col-lg-12 col-md-12">
                        <div class=" col-lg-2 col-md-12">
                            <div class="our-skill">
                                <h5> {{ item.name }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-12">
                            <div class="our-skill">
                                <h5 id="date1">{{ item.date }} </h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="progress1">
                                <input type="hidden" value="99" id="progress1"/>
                                <div class="progress__fill"></div>
                                <span class="progress__text">0%</span>
                                <span class="progress__name">Lesen</span>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-12">
                            <div class="our-skill">
                                <h5 id="demo1"></h5>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-12">
                            <div class="progress2">
                                <input type="hidden" value="99" id="progress2"/>
                                <div class="progress__fill"></div>
                                <span class="progress__text">0%</span>
                                <span class="progress__name">Hören</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <div class="our-skill">
                                <h5 id="demo2"></h5>
                            </div>
                        </div>
                    </div>
                    <div v-for="_item in telcUserExams" :key="_item.id" class="col-lg-12 col-md-12">
                        <div class=" col-lg-2 col-md-12">
                            <div class="our-skill">
                                <h5> {{ _item.name }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-12">
                            <div class="our-skill">
                                <h5 id="date1">{{ _item.date }} </h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="progress1">
                                <input type="hidden" value="99" id="progress1"/>
                                <div class="progress__fill"></div>
                                <span class="progress__text">0%</span>
                                <span class="progress__name">Lesen</span>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-12">
                            <div class="our-skill">
                                <h5 id="demo1"></h5>
                            </div>
                        </div> 
                        <div class="col-lg-3 col-md-12">
                            <div class="progress2">
                                <input type="hidden" value="99" id="progress2"/>
                                <div class="progress__fill"></div>
                                <span class="progress__text">0%</span>
                                <span class="progress__name">Hören</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12">
                            <div class="our-skill">
                                <h5 id="demo2"></h5>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </section>


    </div>
</template>
<script>
export default {

  data() {
    return {
      userId: this.$store.state.userToken.id,

    }
  },
  computed: {
    goetheUserExams() {
      return this.$store.state.goetheUserExam
    },
    telcUserExams() {
      return this.$store.state.TelcUserExam
    },

    isLogged() {
      return this.$store.getters.isLogged
    }
  },
  // created() {
  //     console.log(this.$store.state.userToken);
  //     console.log('fffffjfjfjfjfjnnnn');
  //
  //
  // },
  mounted() {
    this.$store.dispatch('getGoetheUserExams', { userId: this.userId });
    this.$store.dispatch('getTelcUserExams', { userId: this.userId });
  },

}
</script>