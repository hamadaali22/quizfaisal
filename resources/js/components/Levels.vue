<template>
   <div>
    <section class="row home-main-section p-4 container-fluid">
        <div v-for="item in getLevels" :key="item.id" class="col-md-6 m-auto pl-4">
          <router-link :to="getLocalizedSlug(item)"  class="a-link"><div  class="level  w-100 text-center text-light mt-1 pt-2 pb-2">
                {{ item.name }}
            </div></router-link>
          <!-- <router-link :to="'/goethe-tests/'+item.slug" class="a-link"><div  class="level  w-100 text-center text-light mt-1 pt-2 pb-2">
                {{ item.name }}
            </div></router-link> -->
       </div>
       
       <!-- <h2 class="text-center "></h2>
       <div class="col-lg m-auto">
            <div v-for="item in getLevels" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                <router-link :to="'/goethe-tests/'+item.slug" class="a-link">{{ item.name }}</router-link>
            </div>
       </div> -->
    </section>
     <section class="row home-main-section p-4 container-fluid">
       <div class="col-lg pl-4">
        <p v-html="contactInfo.level_desc"></p>
       </div>
       <h2 class="text-center "></h2>
       <div class="col-lg ">
          <div class="row">
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-C1-Prüfung.png" class="img-fluid w-100" alt="Goethe C1 Prüfung">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-Deutsch-Prüfungen.png" class="img-fluid w-100" alt="Goethe Deutsch Prüfungen">
             </div>
             
          </div>
          <div class="row">
            <div class="col-3">

            </div>
            <div class="col-3" style="    margin-top: -50px;">
                 <img  src="https://deutschtests.com/img/Goethe-A1-Prüfung.png" class="img-fluid w-100" alt="Goethe A1 Prüfung">
                 <img  src="https://deutschtests.com/img/goethe-B1-modelltest.png" class="img-fluid w-100" alt="goethe B1 modelltest">
             </div>
             <div class="col-3" style="    margin-top: -28px;">
                 <img  src="https://deutschtests.com/img/goethe-zertifikat-A2.png" class="img-fluid w-100" alt="goethe zertifikat A2">
                 <img  src="https://deutschtests.com/img/Goethe-B2-modelltest.png" class="img-fluid w-100" alt="Goethe B2 modelltest">
             </div>
            
             

          </div>
          <div class="row mt-3 mb-5">
             <div class="col-3" style="    margin-top: -55px;">
                 <img  src="https://deutschtests.com/img/deutsch-online-lernen.png" class="img-fluid w-100" alt="deutsch online lernen">
             </div>
            
          </div>


          <!-- <div class="row">
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-C1-Prüfung.png" class="img-fluid w-100" alt="Deutsch-Prüfungen">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-Deutsch-Prüfungen.png" class="img-fluid w-100" alt="Telc Deutsch">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-A1-Prüfung.png" class="img-fluid w-100" alt="Goethe Deutsch">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/goethe-zertifikat-A2.png" class="img-fluid w-100" alt="Telc Deutsch">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/goethe-B1-modelltest.png" class="img-fluid w-100" alt="Goethe Deutsch">
             </div>

          </div>
          <div class="row">
             
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-A1-Prüfung.png" class="img-fluid w-100" alt="Goethe Deutsch">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/goethe-zertifikat-A2.png" class="img-fluid w-100" alt="Telc Deutsch">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/goethe-B1-modelltest.png" class="img-fluid w-100" alt="Goethe Deutsch">
             </div>

          </div> -->
          
        </div>
       <!-- <div class="col-lg m-auto"> -->

            <!-- <div v-for="item in getLevels" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
                <router-link :to="'/goethe-tests/'+item.slug" class="a-link">{{ item.name }}</router-link>
            </div> -->

            <!-- <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">A1</div>
            <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">A2</div>
            <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">B1</div>
            <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">B2</div>
            <div class="level w-100 text-center text-light mt-1 pt-2 pb-2">C1</div> -->
       <!-- </div> -->
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
    getLocalizedSlug(item) {
      const slugs = {
        en: item.goethe_slug_en,
        ar: item.goethe_slug_ar,
        fr: item.goethe_slug_fr,
        es: item.goethe_slug_es,
        de: item.slug,
      };

      return `/goethe-tests/${slugs[this.$i18n.locale] || item.goethe_slug_de}`;
    }
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
