<template>
    <div>
      <section class="row home-main-section p-5 container-fluid">
        <div class="col-lg m-auto pl-4">
         <p v-html="contactInfo.telc_desc"></p>
        </div>
        <h2 class="text-center "></h2>
 
        <div class="col-lg m-auto">
             <div v-for="item in getLevels" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                 <router-link :to="'/telc-tests/'+item.slug2" class="a-link">{{ item.name2 }}</router-link>
             </div>
 
             <!-- <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">A1</div>
             <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">A2</div>
             <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">B1</div>
             <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">B2</div>
             <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">C1</div> -->
        </div>
       </section>
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
 