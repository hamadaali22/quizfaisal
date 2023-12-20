<template>
   <div>
      <section class="row home-main-section p-4 container-fluid">
          <div v-for="item in getLevels" :key="item.id" class="col-md-6 m-auto pl-4">
              <div  class="level  w-100 text-center text-light mt-1 pt-2 pb-2">
                  <router-link :to="'/telc-tests/'+item.slug2" class="a-link">{{ item.name2 }}</router-link>
              </div>
        </div>
        
      </section>
      <section class="row home-main-section p-4 container-fluid">
       <div class="col-lg pl-4">
        <p v-html="contactInfo.telc_desc"></p>
       </div>
       <h2 class="text-center "></h2>
       <div class="col-lg ">
          <div class="row">
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Telc-Tests.png" class="img-fluid w-100" alt="Telc-Tests">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Telc-Deutsch-Prüfungen.png" class="img-fluid w-100" alt="Telc-Deutsch-Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-3">

            </div>
            <div class="col-3" style="    margin-top: -50px;">
                 <img  src="https://deutschtests.com/img/Telc-A1-Prüfung.png" class="img-fluid w-100" alt="Telc-A1-Prüfung">
                 <img  src="https://deutschtests.com/img/prüfung-telc-b1.png" class="img-fluid w-100" alt="prüfung-telc-b1">
             </div>
             <div class="col-3" style="    margin-top: -28px;">
                 <img  src="https://deutschtests.com/img/telc-a2-modelltest.png" class="img-fluid w-100" alt="telc-a2-modelltest">
                 <img  src="https://deutschtests.com/img/telc-b2-modelltest.png" class="img-fluid w-100" alt="telc-b2-modelltest">
             </div>
          </div>
          <div class="row mt-3 mb-5">
             <div class="col-3" style="    margin-top: -55px;">
                 <img  src="https://deutschtests.com/img/Telc-C1-Prüfung.png" class="img-fluid w-100" alt="Telc-C1-Prüfung">
             </div>
          </div>
        </div>
     
      </section>
     <!-- <section class="row home-main-section p-5 container-fluid">
       <div class="col-lg m-auto pl-4">
        <p v-html="contactInfo.telc_desc"></p>
       </div>
       <h2 class="text-center "></h2>

       <div class="col-lg m-auto">
            <div v-for="item in getLevels" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                <router-link :to="'/telc-tests/'+item.slug2" class="a-link">{{ item.name2 }}</router-link>
            </div>

       </div>
      </section> -->
   </div>
</template>

<script>

export default {
  data(){
    return {

    }

  },
  computed:{
    getLevels(){
      return this.$store.state.levels
    },
    contactInfo(){
       return this.$store.state.contactInfo
    }
  },
  created() {
      console.log(this.$store.state.userToken);
  },
  mounted(){
    this.$store.dispatch('getLevels');
    this.$store.dispatch('getContactinfo');
  },

  methods: {

  },


}
</script>












<!--
import db from '@/init.js';
import {collection, addDoc} from 'firebase/firestore';

// npm install -g firebase-tools
export default {
  name: 'ProductHome',
  props: ["SubQuestions"],
  components: {
    SubQuestionMultipleChoice,
    SubQuestionTrueFalse,
    SubQuestionComplete,
  },
  methods: {
      // async createUser(){
      //   const colRef = query(collection(db, "users")
      //   const dataObj={
      //     firstName:'amr',
      //     lastName:'ali',
      //     dob:'20'
      //   }
      //   const docRef = collection(db, dataObj);
      //   console.log(docRef.id);
      // }

  },
  created() {
    // this.createUser();
    //do something after creating vue instance
    console.log('hamada!');
    // db.collection('User')
    //   .onSnapshot(snapshot=>{
    //     snapshot.docChanges().forEach(change=>{
    //       let doc = change.doc
    //       console.log('changed!');
    //
    //     })
    //   })
  }
}
</script> -->
