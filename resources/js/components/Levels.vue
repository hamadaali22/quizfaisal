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
                 <img  src="https://deutschtests.com/img/Goethe-C1-Prüfung.png" class="img-fluid w-100" :alt="altText1[currentLanguage]">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Goethe-Deutsch-Prüfungen.png" class="img-fluid w-100" :alt="altText2[currentLanguage]">
             </div>
             
          </div>
          <div class="row">
            <div class="col-3">

            </div>
            <div class="col-3" style="margin-top: -50px;">
                 <img  src="https://deutschtests.com/img/Goethe-A1-Prüfung.png" class="img-fluid w-100" :alt="altText3[currentLanguage]">
                 <img  src="https://deutschtests.com/img/goethe-B1-modelltest.png" class="img-fluid w-100" :alt="altText4[currentLanguage]">
             </div>
             <div class="col-3" style="margin-top: -28px;">
                 <img  src="https://deutschtests.com/img/goethe-zertifikat-A2.png" class="img-fluid w-100" :alt="altText5[currentLanguage]">
                 <img  src="https://deutschtests.com/img/Goethe-B2-modelltest.png" class="img-fluid w-100" :alt="altText6[currentLanguage]">
             </div>
            
             

          </div>
          <div class="row mt-3 mb-5">
             <div class="col-3" style="    margin-top: -55px;">
                 <img  src="https://deutschtests.com/img/deutsch-online-lernen.png" class="img-fluid w-100" :alt="altText7[currentLanguage]">
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
        en: "Goethe exam preparation",
        ar: "نماذج امتحانات معهد جوته a1-c1",
        fr: "test de niveau allemand",
        es: "certificado Goethe institut a1-c1",
        de: "Goethe Deutsch-Prüfungen",
      },
      altText2: {
        en: "goethe online exam",
        ar: "نماذج امتحانات معهد جوته",
        fr: "Goethe institut examens",
        es: "certificado Goethe institut",
        de: "Goethe C1 Prüfung - b1 - a1",
      },
      altText3: {
        en: "Goethe A1 exam",
        ar: "نماذج امتحانات a1",
        fr: "test allemand a1",
        es: "certificado goethe a1",
        de: "Goethe A1 Prüfung",
      },
      altText4: {
        en: "Goethe A1 exam - b1",
        ar: "نماذج امتحانات معهد جوته b1",
        fr: "test allemand a1 - b1",
        es: "examen a2 aleman",
        de: "deutsch online lernen a2",
      },
      altText5: {
        en: "Goethe B2 exam - b1",
        ar: "نموذج امتحان b2 goethe",
        fr: "test allemand b2 -b1",
        es: "examen a2 aleman",
        de: "deutsch online lernen b1",
      },
      altText6: {
        en: "Goethe B2 exam",
        ar: "امتحانات جوته b2",
        fr: "test allemand b2",
        es: "goethe test b2",
        de: "deutsch online lernen b2",
      },
      altText7: {
        en: "goethe online exam",
        ar: "نماذج امتحانات معهد جوته",
        fr: "institut de Goethe",
        es: "certificado Goethe institut",
        de: "Lesenverstehen üben",
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
