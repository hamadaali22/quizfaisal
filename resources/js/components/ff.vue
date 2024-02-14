<template>
  <div>
      <!-- <section class="row home-main-section p-5 container-fluid">
          <div class="col-lg m-auto">
              <div v-for="item in goetheUserExams" :key="item.id"
                  class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                  <router-link v-if="isLogged" :to="'/goethe-report/' + item.id" class="a-link">{{ item.name
                  }}</router-link>
              </div>
              <div v-for="_item in telcUserExams" :key="_item.id"
                  class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                  <router-link v-if="isLogged" :to="'/goethe-report/' + _item.id" class="a-link">{{ _item.name
                  }}</router-link>
              </div>
          </div>
      </section> -->
      <div class="chart-wrapper">

          <div class="chart" :style="{ width: size + 'px', height: size + 'px' }">
              <svg class="circle" :width="size" :height="size" :viewBox="['0 0 ' + size + ' ' + size]">
                  <circle :cx="center" :cy="center" :r="radius" fill="none" :stroke="strokeColorBack"
                      :stroke-width="strokeWidth"></circle>
                  <circle :cx="center" :cy="center" :r="radius" fill="none" :stroke="strokeColorFront"
                      :stroke-width="strokeWidth" :stroke-dasharray="dashArray" :stroke-dashoffset="dashOffset"></circle>
              </svg>
              <p class="value">{{ value }} <span>of {{ maxvalue }}</span></p>
          </div>

          <!-- Max. Value <input type="number" v-model="maxvalue"> -->
          <!-- <input type="range" min="0" :max="maxvalue" value="10" v-model="value"> -->

      </div>
  </div>
</template>
<script>
export default {
  data() {
      return {
          userId: this.$store.state.userToken.id,
          strokeWidth: 10,
          strokeColorBack: '#f2f2f2',
          strokeColorFront: '#FFA500',
          radius: 80,
          maxvalue: 150,
          value: 10,
      }
  },

  computed: {
      center: function () {
          let cal = this.strokeWidth / 2 + this.radius;
          return cal;
      },
      size: function () {
          let cal = this.strokeWidth + this.radius * 2;
          return cal;
      },
      dashArray: function () {
          let circumference = Math.PI * (this.radius * 2);
          return circumference
      },
      dashOffset: function () {
          let percent = parseFloat((this.value / this.maxvalue) * 100);
          let process = this.dashArray * (1 - percent / 100);
          return process
      }
  }


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
          font-size: 40px;
          padding: 0px;
          margin: 0px;

          span {
              font-size: 20px;
              display: block;
              color: gray;
          }
      }
  }
}
</style>