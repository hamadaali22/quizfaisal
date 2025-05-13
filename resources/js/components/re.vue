<template>
    <div>
        <section id="about">
            <div class="container-fluid">
                <div class="row">
                    <p>&nbsp;</p>
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
                                                :stroke="strokeColorBack11" :stroke-width="strokeWidth1"></circle>
                                            <circle :cx="center" :cy="center" :r="radius1" fill="none"
                                                :stroke="strokeColorFront1" :stroke-width="strokeWidth1"
                                                :stroke-dasharray="dashArray" :stroke-dashoffset="dashOffset"></circle>
                                        </svg>
                                        <p class="value">{{ value1 }} <span>of {{ maxvalue1 }}</span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 center-block ">
                                jvjh
                            </div>
                            <div class="col-lg-3 col-md-12 center-block">
                                <div class="row center-block ">
                                    <div class="wow zoomIn facesize centerImge img-fluid" id="face">htvhgv</div>
                                    <div class="row justify-content-center ">
                                        fytfgty
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
                        <!-- <div class="col-lg-5 col-md-10 center-block " style="border:solid">
                            <div class="row bigrow" style="border-bottom:solid">
                                <img class="book" src="front/Animation/headphones.png" alt="book">
                                <div class="mywhite">
                                    <p><strong>Hören</strong></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 center-block ">
                                yuuygu
                            </div>
                            <div class="col-lg-4 col-md-12 center-block">
                                kbjh
                            </div>
                            <div class="col-lg-3 col-md-12 center-block " style="text-align: center">
                                <div class="row center-block ">
                                    <div class="wow zoomIn centerImge facesize img-fluid" id="face2">tfytfy</div>
                                    <div class="row center-block justify-content-center">
                                        ygfuyg
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="row ">
                <p>&nbsp;</p>
            </div>
            <div class="row justify-content-center">
                <button class="button " type="button">Ihr detailliertes Ergebnis</button>
            </div>
            <div class="row">
                <p>&nbsp;</p>
            </div>
            <div class="row">
                <p>&nbsp;</p>
            </div>
           

        </section>

    </div>
</template>
  
<script>
export default {

    data() {
        return {
            userId: this.$store.state.userIdNumber,
            strokeWidth1: 10,
            strokeColorBack1: '#f2f2f2',
            strokeColorFront1: '#007bff',
            radius1: 50,
            maxvalue1: 150,
            value1:  0,
            Results:{},
        }
    },
    created(){
        this.getQuestionResult();
    },
    computed: {
        getResult() {
            return this.$store.state.Results;
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
            let percent1 = parseFloat((this.value1 / this.maxvalue1) * 100);
            let process1 = this.dashArray * (1 - percent1 / 100);
            return process1

            // let percent2 = parseFloat((this.value2 / this.maxvalue12) * 100);
            // let process2 = this.dashArray * (1 - percent2 / 100);
            // return process2
        }
    },
    mounted() {
        // this.$store.dispatch('getQuestionResult', { userId: this.userId, examId: 15 });
    },
    methods: {
        getQuestionResult(){
            axios.get('https://deutschtests.com/api/results?user_id='+this.userId+'&exam_id='+15)
            .then(res => {
              console.log('Component mountvvvvmmmm.');
              console.log(res.data.data);
              this.Results = res.data.data;
              this.value1=res.data.data.count_read_succes;
              this.value1=res.data.data.count_read;
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


<!-- 

<template>
    <div>
        <div class="chart-wrapper">
  <h1>Simple SVG Circular Chart with VUE.JS Control</h1>
<div class="chart" :style="{ width: size + 'px', height: size + 'px' }">
<svg class="circle" :width="size" :height="size" :viewBox="['0 0 '+size+' '+size]">
    <circle :cx="center" :cy="center" :r="radius" fill="none" :stroke="strokeColorBack" :stroke-width="strokeWidth"></circle>
    <circle :cx="center" :cy="center" :r="radius" fill="none" :stroke="strokeColorFront" :stroke-width="strokeWidth" :stroke-dasharray="dashArray"
      :stroke-dashoffset="dashOffset"></circle>
</svg>
  <p class="value">{{ value }} <span>of {{ maxvalue }}</span></p>
</div>
    Max. Value <input type="number" v-model="maxvalue">
  
    <input type="range" min="0" :max="maxvalue" value="10" v-model="value">
  
</div>
    </div>
</template>
<script>
export default {
    data() {
        return {
    strokeWidth: 10,
    strokeColorBack: '#f2f2f2',
    strokeColorFront: '#FFA500',
    radius: 80,
    maxvalue: 150,
    value: 10,
        }
  },
  computed: {
    center: function() {
      let cal = this.strokeWidth/2 + this.radius;
      return cal;
    },
    size: function() {
      let cal = this.strokeWidth + this.radius*2;
      return cal;
    },
    dashArray: function() {
      let circumference= Math.PI*(this.radius*2);
      return circumference
    },
    dashOffset: function () {
      let percent = parseFloat( (this.value / this.maxvalue) * 100);
      let process = this.dashArray * (1 - percent / 100);
      return process
    }
  }
};
</script>
<style>
.chart-wrapper{
  text-align:center;
  font-family: 'Arial';
  .chart{
    position:relative;
    width:160px;
    height:160px;
    margin:20px auto;
    .circle{
    transform-origin: center;
      transform: rotate(-90deg);
    }
    .value{
      position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      font-size:40px;
      padding:0px;
      margin:0px;
      span{
        font-size:20px;
        display:block;
        color: gray;
      }
    }
  }

}

</style> -->