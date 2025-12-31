<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto pl-4">
        <!-- <h1 v-html="contactInfo.title" style="font-size: 19px;"></h1> -->
        <!-- <h2 v-html="contactInfo.title2" style="font-size: 16px;"></h2> -->
        <p v-html="getLocalizedDesc(contactInfo)"></p>
      </div>
      <!-- <div class="row col-lg m-auto"> -->
      <!-- <img  :src="contactInfo.image" class="img-fluid w-100" alt=""> -->
      <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home2.png" class="img-fluid " alt="">
          <img  src="http://127.0.0.1:8000/img/settings/home3.png" class="img-fluid " alt=""> -->
      <!-- <img  src="http://127.0.0.1:8000/img/settings/home1.png" class="img-fluid w-30" alt=""> -->

      <!-- </div> -->
      <div class="col-lg ">
        <div class="row">
          <div class="col-4">
            <img :src="contactInfo.b1" class="img-fluid w-100" :alt="altTextB1[currentLanguage]">
          </div>
          <div class="col-4">
            <img :src="contactInfo.a2" class="img-fluid w-100"  :alt="altTextA2[currentLanguage]">
          </div>
          <div class="col-4">
            <img :src="contactInfo.a1" class="img-fluid w-100"  :alt="altTextA1[currentLanguage]">
          </div>
        </div>
        <div class="row mt-3 mb-5">
          <div class="col-4">
            <img :src="contactInfo.b2" class="img-fluid w-100" :alt="altTextB2[currentLanguage]">
            <img :src="contactInfo.c1" class="img-fluid w-100" :alt="altTextC1[currentLanguage]">
          </div>
          <div class="col-8">
            <img :src="contactInfo.m1" class="img-fluid w-100" :alt="altTextMain[currentLanguage]">
          </div>
        </div>
      </div>




    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentLanguage: this.$i18n.locale,
      altTextA1: {
        en: "German tests online A1",
        ar: "نماذج امتحان a1",
        fr: "test allemand niveau a1",
        es: "examen A1 aleman",
        de: "Deutsch-Prüfungen A1-C1",
      },
      altTextA2: {
        en: "german level test free A2",
        ar: "نماذج امتحان  a2",
        fr: "Examens d'allemand A2",
        es: "examen aleman a2",
        de: "Telc Deutsch",
      },
      altTextB1: {
        en: "goethe online test B1",
        ar: "نماذج امتحان b1",
        fr: "test de niveau allemande b1",
        es: "examen aleman b1",
        de: "Goethe Deutsch",
      },
      altTextB2: {
        en: "telc exam online B2",
        ar: " اختبار تحديد مستوى المانى b2",
        fr: "exercices d'allemand b2",
        es: "examen aleman B2",
        de: "Teste dein Deusch",
      },
      altTextC1: {
        en: "Telc German exam C1",
        ar: "اختبار تحديد مستوى المانى C1",
        fr: "goethe institut examens c1",
        es: "ejercicios en alemán C1",
        de: "Deutsch Tests online",
      },
      altTextMain: {
        en: "goethe exam online",
        ar: "نماذج امتحانات جوته",
        fr: "test allemand niveau",
        es: "ejercicios en alemán",
        de: "Deutsch Test online",
      },
    };
  },
  computed: {
    contactInfo() {
      return this.$store.state.contactInfo
    }
  },
  mounted() {
    this.$store.dispatch('getContactinfo');
  },
  methods: {
      getLocalizedDesc(item) {
        const slugs = {
          en: item.about_en,
          ar: item.about_ar,
          fr: item.about_fr,
          es: item.about_es,
          de: item.about_de,
        };

        return slugs[this.$i18n.locale] || item.about_de;
      }
  },
}
</script>
