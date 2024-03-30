<template>
    <div>
        <!-- col-md-4 col-sm-12 col-xs-12 border border-raduis -->
        <section class="questions  m-4 ">
            <!-- <div class="row col-lg-12 col-md-12  border border-raduis mb-2 p-2  mb-4">
                <div class="row col-lg-12 col-md-10 ">
                    <p>Viele Prüfungsteilnehmer sprechen oft von Goethe Deutsch oder Telc Deutsch. Sie meinen berechtigt damit, dass die Prüfungen beim Goethe-Institut oder bei Telc einer speziellen Vorbereitung bedürfen.</p>
                </div>
            </div> -->
            <div v-for="(item, itemIndex) in getquizes" :key="item.id" class="mcq p-2">
                <div class="row">
                    <h6>{{ itemIndex +1 }}- {{item.id}} {{ item.title }}</h6>
                </div>
                <div class="row  ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3" :id="'quize'+itemIndex+'a'" v-on:click="addQuize(itemIndex,item.id,item.level_id,item.levels.name3,item.first_choice,item.expected_answer,item.sets.type,'a','quize'+itemIndex+'a')">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.first_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3" :id="'quize'+itemIndex+'b'" v-on:click="addQuize(itemIndex,item.id,item.level_id,item.levels.name3,item.second_choice,item.expected_answer,item.sets.type,'b','quize'+itemIndex+'b')">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.second_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3" :id="'quize'+itemIndex+'c'" v-on:click="addQuize(itemIndex,item.id,item.level_id,item.levels.name3,item.third_choice,item.expected_answer,item.sets.type,'c','quize'+itemIndex+'c')">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.third_choice}}</label>
                    </div>
                </div>
                <div class="row ml-3">
                    <div class="col-md-4 multi-item q-1 border border-raduis pt-2 pl-3 pr-3 mr-5 mb-3" :id="'quize'+itemIndex+'d'" v-on:click="addQuize(itemIndex,item.id,item.level_id,item.levels.name3,item.fourth_choice,item.expected_answer,item.sets.type,'d','quize'+itemIndex+'d')">
                        <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                        <label class="multi-label" for="mars" id="mars">{{item.fourth_choice}}</label>
                    </div>
                </div>
            </div>
        </section>
    <section>
        <div class="next mt-5 mb-5">
            
            <h3 class="border-raduis back text-light m-auto text-center p-2"><button type="submit" @click.prevent="SaveQuestion" style="background: #3e83b3;border: #3e83b3 0px solid !important;color: #fff;" >
                 Nächster Teil
            </button></h3>
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
        levelName:null,
        type:null,
        qnum:-0,
        questionAnswer:[],
        names : [],
      }
    },
    computed:{
        getquizes(){
            return this.$store.state.quizes
        },
        
    },
    mounted(){
        console.log(this.questionAnswer);
        this.$store.dispatch('getQuizes', { levelName: this.levelName,type:this.type ,quizes:this.questionAnswer});
    },
    methods:{
        addQuize(index,quizeId,levelId,levelName,myanswer,expected_answer,quizeType,chooseItem,quizeClass) {

            this.levelName=levelName;
            this.type=quizeType;
            let quize_ans;
            if(this.userId){
                quize_ans={'user_id': 19,'quize_id': quizeId,'level_id':levelId ,'levelName':levelName ,'answer':myanswer,'expected_answer':expected_answer,'type':quizeType}
            }else{
                quize_ans={'user_id': 19,'quize_id': quizeId,'level_id':levelId ,'levelName':levelName ,'answer':myanswer,'expected_answer':expected_answer,'type':quizeType}
            }
            
            if(this.names.includes(quizeId)){
              for (let i = 0; i < this.names.length; i++) {
                if(this.names[i]==quizeId){
                  this.$delete(this.names, i);
                  this.$delete(this.questionAnswer, i);
                  this.names.push(quizeId);
                  this.questionAnswer.push(quize_ans);
                }
              }
            }else{
                this.names.push(quizeId);
                this.questionAnswer.push(quize_ans);
            }
            console.log('quize_ans');
            console.log(this.questionAnswer);
            console.log('quize_ans');


            if(chooseItem =='a'){
                let answera = this.$el.querySelector("#"+quizeClass);
                    answera.style.color = '#fff';
                    answera.style.background = '#3e83b3';
                let answerb = this.$el.querySelector("#quize"+index+'b');
                    answerb.style.color = '';
                    answerb.style.background = '';
                let answerc = this.$el.querySelector("#quize"+index+'c');
                    answerc.style.color = '';
                    answerc.style.background = '';
                let answerd = this.$el.querySelector("#quize"+index+'d');
                    answerd.style.color = '';
                    answerd.style.background = '';
               
            }
            if(chooseItem =='b'){
                let answera = this.$el.querySelector("#quize"+index+'a');
                    answera.style.color = '';
                    answera.style.background = '';
                let answerb = this.$el.querySelector("#"+quizeClass);
                    answerb.style.color = '#fff';
                    answerb.style.background = '#3e83b3';                
                let answerc = this.$el.querySelector("#quize"+index+'c');
                    answerc.style.color = '';
                    answerc.style.background = '';
                let answerd = this.$el.querySelector("#quize"+index+'d');
                    answerd.style.color = '';
                    answerd.style.background = '';
                
            }
            if(chooseItem =='c'){
                let answera = this.$el.querySelector("#quize"+index+'a');
                    answera.style.color = '';
                    answera.style.background = '';
                let answerb = this.$el.querySelector("#quize"+index+'b');
                    answerb.style.color = '';
                    answerb.style.background = '';

                let answerc = this.$el.querySelector("#"+quizeClass);
                    answerc.style.color = '#fff';
                    answerc.style.background = '#3e83b3';
                let answerd = this.$el.querySelector("#quize"+index+'d');
                    answerd.style.color = '';
                    answerd.style.background = '';
            }
            if(chooseItem =='d'){
                let answera = this.$el.querySelector("#quize"+index+'a');
                    answera.style.color = '';
                    answera.style.background = '';
                let answerb = this.$el.querySelector("#quize"+index+'b');
                    answerb.style.color = '';
                    answerb.style.background = '';
                let answerc = this.$el.querySelector("#quize"+index+'c');
                    answerc.style.color = '';
                    answerc.style.background = '';

                let answerd = this.$el.querySelector("#"+quizeClass);
                    answerd.style.color = '#fff';
                    answerd.style.background = '#3e83b3';
            }
        },

        
        SaveQuestion(){
            if(this.questionAnswer.length == 0){
                // console.log(this.questionAnswer);
                this.$toaster.error('Sie müssen mindestens eine Frage beantworten.');

                // let data={'quizes':this.questionAnswer, 'levelName': this.levelName};

                // console.log(this.levelName+'----'+ this.type+'data'+data.levelName);
                
                // axios.get('https://deutschtests.com/api/quizes',{
                // params: {
                //     data: JSON.stringify(this.questionAnswer),
                //     levelName:this.levelName,
                //     type:this.type
                // }})
                // .then(res => {
                //     console.log(res.data+'mariam khalll');
                    
                // })
                // .then(err => console.log(err))

            }else{
                let data={'quizes':this.questionAnswer, 'levelName': this.levelName};
                axios.post('https://deutschtests.com/api/save-quize-test', data)
                .then(res => {
                    console.log(res)
                    // commit('setUserToken', res.data.token)
                })
                .catch(err => {
                    console.log(err)
                })
                
                
                // console.log(this.levelName+'----'+ this.type+'data'+data.levelName);

                if(this.userId){
                     this.$store.dispatch('getQuizes', {user_id: this.$store.state.userToken.id, levelName: this.levelName, type: this.type,quizes:this.questionAnswer});
                }else{
                     this.$toaster.error('Sie müssen sich registrieren, um Ihr Ergebnis zu erhalten und die Musterlösung zu sehen.');
                     this.$store.dispatch('getQuizes', {user_id:0, levelName: this.levelName, type: this.type,quizes:this.questionAnswer});
                }
                this.levelName=null;
                this.type=null;
                this.names=[];
                this.questionAnswer=[];
                window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
            }
        },
    }


}
</script>
