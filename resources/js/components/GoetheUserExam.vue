<template>
  <div>

      <section id="">
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
                          <img src="front/Animation/Deutschtests.jpg" alt="Deutschtest" width="200px" />
                      </div>
                  </div>

                  <div class="col-md-12" >
                      <div class="col-md-2"></div>
                      <div class="col-md-2"></div>
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

                  <div v-for="(_item, itemIndex) in goetheUserExams" class="col-lg-12 col-md-12">
                      <div class=" col-lg-2 col-md-12" >
                            <div class="our-skill   w-100 text-center text-light mt-1 pt-2 pb-2" style="background-color: #3d83b3;border-radius: 5px;margin-top: -9px !important;    margin-bottom: 16px !important;">
                                <router-link v-if="isLogged" :to="'/goethe-report/' + _item.id"   class="a-link">{{ _item.name}}</router-link>
                            </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="our-skill">
                              <h5 id="date1">{{_item.date }} </h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="progress1">
                              <input type="hidden" value="88" id="progress1" />
                              <div class="progress__fill" :style="{background:'#3aa6d0', width: _item.count_read_percent + '%' }"></div>
                              <span class="progress__text">{{_item.count_read_percent }}%</span>
                              <span class="progress__text" style="left: 25px;!important">Lesen</span>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12" v-if="_item.count_read_percent >= 60">
                          <div class="our-skill">
                            <h5 id="demo2" style="color: green;">bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12" v-else>
                          <div class="our-skill">
                            <h5 id="demo1" style="color: red;">nicht bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="progress2">
                              <input type="hidden" value="66" id="progress2" />
                              <div class="progress__fill" :style="{background:'#3aa6d0', width: _item.count_listen_percent + '%' }"></div>
                              <span class="progress__text">{{_item.count_listen_percent}}%</span>
                              <!-- <span class="progress__name">Hören</span> -->
                              <span class="progress__text" style="left: 25px;!important">Hören</span>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12"  v-if="_item.count_listen_percent >= 60">
                          <div class="our-skill" style="margin-bottom: 20px;">
                            <h5 id="demo2" style="color: green;">bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12"  v-else>
                          <div class="our-skill" style="margin-bottom: 20px;">
                            <h5 id="demo1" style="color: red;">nicht bestanden</h5>
                          </div>
                      </div>
                  </div>
                  <div v-for="(item, itemIndex) in telcUserExams" class="col-lg-12 col-md-12">
                      <div class=" col-lg-2 col-md-12">
                            <div class="our-skill   w-100 text-center text-light mt-1 pt-2 pb-2" style="background-color: #3d83b3;border-radius: 5px;margin-top: -9px !important;    margin-bottom:16px !important;">
                                <router-link v-if="isLogged" :to="'/goethe-report/' + item.id"   class="a-link">{{ item.name}}</router-link>
                            </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="our-skill">
                              <h5 id="date1">{{item.date }}  </h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="progress1">
                              <input type="hidden" value="88" id="progress1" />
                              <div class="progress__fill" :style="{background:'#3aa6d0', width: item.count_read_succes + '%' }"></div>
                              <span class="progress__text">{{item.count_read_percent }}%</span>
                              <span class="progress__text" style="left: 25px;!important">Lesen</span>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12" v-if="item.count_read_percent >=60">
                          <div class="our-skill">
                            <h5 id="demo2" style="color: green;">bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12" v-else>
                          <div class="our-skill">
                            <h5 id="demo1" style="color: red;">nicht bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12">
                          <div class="progress2">
                              <input type="hidden" value="66" id="progress2" />
                              <div class="progress__fill" :style="{background:'#3aa6d0', width: item.count_listen_succes + '%' }"></div>
                              <span class="progress__text">{{item.count_listen_percent}}%</span>
                              <span class="progress__text" style="left: 25px;!important">Hören</span>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12" v-if="item.count_read_percent >=60">
                          <div class="our-skill" style="margin-bottom: 20px;">
                            <h5 id="demo2" style="color: green;">bestanden</h5>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-12"  v-else>
                          <div class="our-skill" style="margin-bottom: 20px;">
                            <h5 id="demo1" style="color: red;">nicht bestanden</h5>
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
          lessen: 50,
          horen:30
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
  // methods: {
  //     makeProgress() {
  //         if (this.progress < 100) {
  //             this.progress += 5;
  //         }
  //     }
  // }

}
</script>
