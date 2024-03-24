<template>
    <div>
        <!-- col-md-4 col-sm-12 col-xs-12 border border-raduis -->
        <section class="questions  m-4 ">
            <div class="row col-lg-12 col-md-12  border border-raduis mb-2 p-2  mb-4">
                <div class="row col-lg-12 col-md-10 ">
                    <p>Viele Prüfungsteilnehmer sprechen oft von Goethe Deutsch oder Telc Deutsch. Sie meinen berechtigt damit, dass die Prüfungen beim Goethe-Institut oder bei Telc einer speziellen Vorbereitung bedürfen.</p>
                </div>
            </div>
            <div v-for="(item, itemIndex) in getquizes" :key="item.id" class="mcq p-2">
                <div class="row">
                    <h6>{{ itemIndex +1 }}- {{ item.title }}</h6>
                </div>
                <div class="row  ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis     pt-2 pl-3 pr-3 mr-5 mb-3">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.first_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.second_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.third_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.fourth_choice}}</label>
                    </div>
                </div>
            </div>
        </section>
        
    <section>
        <div class="next mt-5 mb-5">
            <h3 class="border-raduis back text-light m-auto text-center p-2">Next</h3>
        </div>
    </section>
    </div>
</template>

<script>

import swal from "sweetalert";
  export default {

    data(){
      return {
        userId:this.$store.state.userToken,
        pageId:'1',
        qnum:-0,
        questionAnswer:[],
        names : [],
        // arr : [
        //   { id: '01', name: 'John', email: 'john@email.com' },
        //   { id: '02', name: 'Sara', email: 'sara@email.com' },
        //   { id: '03', name: 'Michael', email: 'michael@email.com' },
        // ]

      }
    },
    computed:{
        getquizes(){
            return this.$store.state.quizes
        },
        
    },
    mounted(){
      this.$store.dispatch('getQuizes', { pageId:this.pageId });
    },


}
</script>
