<template>
   <div>
      <section class="row home-main-section p-4 container-fluid">
          <div v-for="item in getLevels" :key="item.id" class="col-md-6 m-auto pl-4">
            <!-- <router-link :to="'/telc-tests/'+item.slug2" class="a-link">
              <div  class="level  w-100 text-center text-light mt-1 pt-2 pb-2">
                  {{ item.name }}
              </div></router-link> -->
              
              <router-link :to="getLocalizedSlug(item)"  class="a-link">
                <div  class="level  w-100 text-center text-light mt-1 pt-2 pb-2">
                  {{ item.name }}
                </div>
              </router-link>

        </div>
        
      </section>
      <section class="row home-main-section p-4 container-fluid">
       <div class="col-lg pl-4">
        <p v-html="getLevelDesc(contactInfo)"></p>
       </div>
       <h2 class="text-center "></h2>
       <div class="col-lg ">
          <div class="row">
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Telc-Tests.png" class="img-fluid w-100" :alt="altText1[currentLanguage]">
             </div>
             <div class="col-4">
                 <img  src="https://deutschtests.com/img/Telc-Deutsch-Prüfungen.png" class="img-fluid w-100" :alt="altText2[currentLanguage]">
             </div>
             
          </div>
          <div class="row">
            <div class="col-3">

            </div>
            <div class="col-3" style="    margin-top: -50px;">
                 <img  src="https://deutschtests.com/img/Telc-A1-Prüfung.png" class="img-fluid w-100" :alt="altText3[currentLanguage]">
                 <img  src="https://deutschtests.com/img/prüfung-telc-b1.png" class="img-fluid w-100" :alt="altText4[currentLanguage]">
             </div>
             <div class="col-3" style="    margin-top: -28px;">
                 <img  src="https://deutschtests.com/img/telc-a2-modelltest.png" class="img-fluid w-100" :alt="altText5[currentLanguage]">
                 <img  src="https://deutschtests.com/img/telc-b2-modelltest.png" class="img-fluid w-100" :alt="altText6[currentLanguage]">
             </div>
          </div>
          <div class="row mt-3 mb-5">
             <div class="col-3" style="    margin-top: -55px;">
                 <img  src="https://deutschtests.com/img/Telc-C1-Prüfung.png" class="img-fluid w-100" :alt="altText7[currentLanguage]">
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
      currentLanguage: this.$i18n.locale,
      altText1: {
        en: "Telc german exam",
        ar: "نموذج امتحان telc",
        fr: "allemand test niveau",
        es: "examen telc",
        de: "Telc Tests",
      },
      altText2: {
        en: "Telc german test",
        ar: "نماذج امتحان telc",
        fr: "allemand test de niveau",
        es: "examen telc aleman",
        de: "Telc Deutsch-Prüfungen",
      },
      altText3: {
        en: "Telc A1 exam",
        ar: "نماذج امتحان a1 telc",
        fr: "examen allemand a1",
        es: "examen de alemán a1",
        de: "Telc A1 Prüfung",
      },
      altText4: {
        en: "telc b1 exam",
        ar: "نماذج امتحان b1 telc",
        fr: "allemand test niveau",
        es: "examen telc b1 alemán",
        de: "prüfung telc b1",
      },
      altText5: {
        en: "Telc a2 exam",
        ar: "نماذج امتحان a2 telc",
        fr: "test allemand a2",
        es: "examen a2 aleman online",
        de: "prüfung telc a2",
      },
      altText6: {
        en: "telc exam b2",
        ar: "نماذج امتحان b2 telc",
        fr: " test allemand b2",
        es: "examen telc b2",
        de: "Telc C1 hoschole b2",
      },
      altText7: {
        en: "Telc exam online c1",
        ar: "نماذج امتحان c1 telc",
        fr: "test allemand c1",
        es: "examen telc C1",
        de: "Telc C1 Prüfung",
      },
    }

  },
  computed:{
    getLevels(){
      return this.$store.state.telcs
    },
    contactInfo(){
       return this.$store.state.contactInfo
    }
  },
  created() {
      console.log(this.$store.state.userToken);
  },
  mounted(){
    this.$store.dispatch('getTelcs');
    this.$store.dispatch('getContactinfo');
  },

  methods: {
    getLocalizedSlug(item) {
      console.log(this.$i18n.locale);
      const slugs = {
        en: 'telc-exam-online',
        ar: 'Telc-نماذج-امتحان',
        fr: 'allemand-examens-telc',
        es: 'examen-telc-aleman',
        de: 'deutsch-test-online',
      };
      const slugs2 = {
        en: item.slug_en,
        ar: item.slug_ar,
        fr: item.slug_fr,
        es: item.slug_es,
        de: item.slug_de,
      };
      return `/telc/${slugs[this.$i18n.locale]}/${slugs2[this.$i18n.locale] || item.slug_de}`;
    },
    getLevelDesc(item) {
        const slugs = {
          en: item.telc_desc_en,
          ar: item.telc_desc_ar,
          fr: item.telc_desc_fr,
          es: item.telc_desc_es,
          de: item.telc_desc_de,
        };

        return slugs[this.$i18n.locale] || item.telc_desc_de;
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
