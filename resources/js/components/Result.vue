<template>
    <div>
        <section id="" v-if="userId">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="title-area">
                          <h2 class="title-about">Ihr Fortschritt</h2><br/>
                          <div class="single-service wow zoomIn" align="center">
                          <img src="front/Animation/Deutschtests.jpg" alt="Deutschtest" width="200px" />
                      </div>
                          <!-- <span class="line"></span> -->
                      </div>
                  </div>
                  <div class="col-md-12">
                      
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 center-block">
                        <div class="col-lg-5 col-md-10 center-block " style="border:solid">
                            <div class="row bigrow" style="border-bottom:solid">
                                <img class="book" src="front/Animation/book.png" alt="book">
                                <div class="mywhite">
                                    <p><strong>Lesen</strong></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-center">
                                <div class="chart-wrapper">
                                    <div class="chart" :style="{ width: size + 'px', height: size + 'px' }">
                                        <svg class="circle" :width="size" :height="size"
                                            :viewBox="['0 0 ' + size + ' ' + size]">
                                            <circle :cx="center" :cy="center" :r="radius1" fill="none"
                                                :stroke="strokeColorBack1" :stroke-width="strokeWidth1"></circle>
                                            <circle :cx="center" :cy="center" :r="radius1" fill="none"
                                                :stroke="strokeColorFront1" :stroke-width="strokeWidth1"
                                                :stroke-dasharray="dashArray" :stroke-dashoffset="dashOffset"></circle>
                                        </svg>
                                        <p class="value"> <span>{{ value1 }} / {{ maxvalue1 }}</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 center-block ">
                                <div class="chart-wrapper">
                                    <div class="chart" :style="{ width: size + 'px', height: size + 'px' }">
                                        <svg class="circle" :width="size" :height="size"
                                            :viewBox="['0 0 ' + size + ' ' + size]">
                                            <circle :cx="center" :cy="center" :r="radius1" fill="none"
                                                :stroke="strokeColorBack1" :stroke-width="strokeWidth1"></circle>
                                            <circle :cx="center" :cy="center" :r="radius1" fill="none"
                                                :stroke="strokeColorFront1" :stroke-width="strokeWidth1"
                                                :stroke-dasharray="dashArray" :stroke-dashoffset="dashOffset"></circle>
                                        </svg>
                                        <p class="value">{{ total1 }}% <span></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 center-block">
                                <div class="row center-block" v-if="total1 >= 60">
                                    <div class="wow zoomIn facesize centerImge img-fluid" id="face"><img src="front/Animation/happy-face.png" /></div>
                                    <div class="row justify-content-center ">
                                        <h5 id="facetext2" style="color: green;">bestanden</h5>
                                    </div>
                                </div>
                                <div class="row center-block " v-else>
                                    <div class="wow zoomIn facesize centerImge img-fluid" id="face"><img src="front/Animation/sad-face.png" /></div>
                                    <div class="row justify-content-center " >
                                        <h5 id="facetext" style="color: red;">nicht bestanden</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- {{ Results.count_listen }} -->
                        <div class="col-md-1">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <div class="col-md-1 ">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <div class="col-lg-5 col-md-10 center-block " style="border:solid">
                            <div class="row bigrow" style="border-bottom:solid">
                                <img class="book" src="front/Animation/headphones.png" alt="book">
                                <div class="mywhite">
                                    <p><strong>Hören</strong></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 center-block ">
                                <div class="chart-wrapper">
                                    <div class="chart" :style="{ width: size2 + 'px', height: size2 + 'px' }">
                                        <svg class="circle" :width="size2" :height="size2"
                                            :viewBox="['0 0 ' + size2 + ' ' + size2]">
                                            <circle :cx="center2" :cy="center2" :r="radius2" fill="none"
                                                :stroke="strokeColorBack2" :stroke-width="strokeWidth2"></circle>
                                            <circle :cx="center2" :cy="center2" :r="radius2" fill="none"
                                                :stroke="strokeColorFront2" :stroke-width="strokeWidth2"
                                                :stroke-dasharray="dashArray2" :stroke-dashoffset="dashOffset2"></circle>
                                        </svg>
                                        <p class="value"> <span>{{ value2 }} / {{ maxvalue2 }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 center-block">
                                <div class="chart-wrapper">
                                    <div class="chart" :style="{ width: size + 'px', height: size + 'px' }">
                                        <svg class="circle" :width="size2" :height="size2"
                                            :viewBox="['0 0 ' + size2 + ' ' + size2]">
                                            <circle :cx="center2" :cy="center2" :r="radius2" fill="none"
                                                :stroke="strokeColorBack2" :stroke-width="strokeWidth2"></circle>
                                            <circle :cx="center2" :cy="center2" :r="radius2" fill="none"
                                                :stroke="strokeColorFront2" :stroke-width="strokeWidth2"
                                                :stroke-dasharray="dashArray2" :stroke-dashoffset="dashOffset2"></circle>
                                        </svg>
                                        <p class="value">{{ total2 }}% <span></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 center-block " style="text-align: center">
                                
                                <div class="row center-block" v-if="total2 >= 60">
                                    <div class="wow zoomIn facesize centerImge img-fluid" id="face"><img src="front/Animation/happy-face.png" /></div>
                                    <div class="row justify-content-center ">
                                        <h5 id="facetext2" style="color: green;">bestanden</h5>
                                    </div>
                                </div>
                                <div class="row center-block " v-else>
                                    <div class="wow zoomIn facesize centerImge img-fluid" id="face"><img src="front/Animation/sad-face.png" /></div>
                                    <div class="row justify-content-center " >
                                        <h5 id="facetext" style="color: red;">nicht bestanden</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row ">
                <p>&nbsp;</p>
            </div>
            <div class="row justify-content-center">
                
                <button class="button " type="button"><router-link v-if="isLogged" :to="'/goethe-report/'+this.examId" class="a-link">Ihr detailliertes Ergebnis</router-link></button>
            </div>
            <div class="row">
                <p>&nbsp;</p>
            </div>
            <div class="row">
                <p>&nbsp;</p>
            </div>
           

        </section>
        <section class="row home-main-section p-5 container-fluid" v-else>
            <div class="col-lg m-auto pl-4">
                <p class="text-center ">    يجب تسجيل الدخول اولا ثم إعادة الفحص لمعرفة نتيجك</p>
                <router-link :to="'/placement-questions'" class="a-link">
                    <div class="level  w-50 text-center text-light mt-1 pt-2 pb-2 ">
                        {{ $t('LogIn') }}
                    </div>
                </router-link>
            </div>
        </section>

    </div>
</template>
  
<script>
export default {
    // examId:this.$route.params.examId,
    data() {
        return {
            userId: this.$store.state.userIdNumber,
            examId:this.$route.params.examId,
            strokeWidth1: 10,
            strokeColorBack1: '#f2f2f2',
            strokeColorFront1: '#007bff',
            radius1: 50,
            maxvalue1: 150,
            value1:  0,
            total1:0,

            strokeWidth2: 10,
            strokeColorBack2: '#f2f2f2',
            strokeColorFront2: '#007bff',
            radius2: 50,
            maxvalue2: 150,
            value2:  0,
            total2:0,

            Results:{},
        }
    },
    created(){
        this.getQuestionResult();
    },
    computed: {
        // reading
        // getResult() {
        //     return this.$store.state.Results;
        // },
        isLogged(){
            return this.$store.getters.isLogged
        },
        center: function () {
            let cal = this.strokeWidth1 / 2 + this.radius1;
            return cal; 
        },
        size: function () {
            let cal = this.strokeWidth1 + this.radius1 * 2;
            return cal;
        },
        dashArray: function () {
            let circumference = Math.PI * (this.radius1 * 2);
            return circumference
        },
        dashOffset: function () {
            let percent = parseFloat((this.value1 / this.maxvalue1) * 100);
            let process = this.dashArray * (1 - percent / 100);
            return process
        },
        // Listening
        center2: function () {
            let cal = this.strokeWidth2 / 2 + this.radius2;
            return cal; 
        },
        size2: function () {
            let cal = this.strokeWidth2 + this.radius2 * 2;
            return cal;
        },
        dashArray2: function () {
            let circumference = Math.PI * (this.radius2 * 2);
            return circumference
        },
        dashOffset2: function () {
            let percent = parseFloat((this.value2 / this.maxvalue2) * 100);
            let process = this.dashArray * (1 - percent / 100);
            return process
        }

    },
    mounted() {
        // this.$store.dispatch('getQuestionResult', { userId: this.userId, examId: 15 });
    },
    methods: {
        getQuestionResult(){
            // this.examId
            console.log(this.userId+'ccnnnn'+this.examId+'ccnnnn');
            axios.get('https://deutschtests.com/api/results?user_id='+this.userId+'&exam_id='+this.examId)
            .then(res => {
              console.log('Component mountvvvvmmmm.');
              console.log(this.userId);
              this.Results = res.data.data;
              this.value1=res.data.data.count_read_succes;
              this.maxvalue1=res.data.data.count_read;
              this.total1=res.data.data.count_read_percent;

              this.value2=res.data.data.count_listen_succes;
              this.maxvalue2=res.data.data.count_listen;
              this.total2=res.data.data.count_listen_percent;
              
            })
            .then(err => console.log(err))

        },
    },
}
</script>
<style>
.chart-wrapper {
    text-align: center;
    font-family: 'Arial';

    .chart {
        position: relative;
        width: 160px;
        height: 160px;
        margin: 20px auto;

        .circle {
            transform-origin: center;
            transform: rotate(-90deg);
        }

        .value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            padding: 0px;
            margin: 0px;

            span {
                font-size: 10px;
                display: block;
                color: gray;
            }
        }
    }
}
</style>