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
        <p v-html="getLevelDesc(contactInfo)"></p>
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
            <div class="col-3" style="margin-top: -50px;">
                 <img  src="https://deutschtests.com/img/Goethe-A1-Prüfung.png" class="img-fluid w-100" alt="Goethe A1 Prüfung">
                 <img  src="https://deutschtests.com/img/goethe-B1-modelltest.png" class="img-fluid w-100" alt="goethe B1 modelltest">
             </div>
             <div class="col-3" style="margin-top: -28px;">
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
      currentLanguage: this.$i18n.locale,
      altText1: {
        en: "goethe exam b2",
        ar: "نماذج غوته a1",
        fr: "allemand test niveau",
        es: "aprender aleman gratis",
        de: "Goethe C1 Prüfung",
      },
      altText2: {
        en: "goethe online test",
        ar: "نماذج امتحان b2",
        fr: "test niveau allemand",
        es: "certificado goethe institut",
        de: "Goethe Deutsch Prüfungen",
      },
      altText3: {
        en: "a1 goethe exam",
        ar: "نماذج امتحان a1",
        fr: "teste goethe a1",
        es: "certificado goethe a1",
        de: "Goethe A1 Prüfung",
      },
      altText4: {
        en: "german a2 exam",
        ar: "امتحان b2 الماني",
        fr: "goethe examen a2",
        es: "examen a2 goethe",
        de: "goethe zertifikat A2",
      },
      altText5: {
        en: "goethe test b1",
        ar: "نماذج امتحان b1",
        fr: "goethe institut b1",
        es: "examen aleman b1",
        de: "goethe B1 modelltest",
      },
      altText5: {
        en: "goethe b2 exam",
        ar: "امتحانات جوته b2",
        fr: "examen b2 goethe institut",
        es: "goethe test b2",
        de: "Goethe B2 modelltest",
      },
      altText5: {
        en: "goethe institut online test",
        ar: "نماذج امتحانات a1",
        fr: "exercices allemand en ligne",
        es: "examen c1 aleman",
        de: "deutsch online lernen",
      },
    }

  },
  computed:{
    getLevels(){
      return this.$store.state.goethes
    },
    contactInfo(){
       return this.$store.state.contactInfo
    }
  },
  created() {
      console.log(this.$store.state.userToken);
  },
  mounted(){
    this.$store.dispatch('getGoethes');
    this.$store.dispatch('getContactinfo');
  },

  methods: {
    getLocalizedSlug(item) {
      
      const slugs = {
        en: 'online-Goethe-exam',
        ar: 'نماذج-امتحانات-معهد-جوته',
        fr: 'goethe-institut-examens',
        es: 'alemán-Goethe-tests',
        de: 'goethe-deutsch-test',
      };
      const slugs2 = {
        en: item.slug_en,
        ar: item.slug_ar,
        fr: item.slug_fr,
        es: item.slug_es,
        de: item.slug_de,
      };
      return `/goethe/${slugs[this.$i18n.locale]}/${slugs2[this.$i18n.locale] || item.slug_de}`;
    },
    getLevelDesc(item) {
        const slugs = {
          en: item.goethe_desc_en,
          ar: item.goethe_desc_ar,
          fr: item.goethe_desc_fr,
          es: item.goethe_desc_es,
          de: item.goethe_desc_de,
        };

        return slugs[this.$i18n.locale] || item.goethe_desc_de;
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
