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
            <img :src="contactInfo.b2" class="img-fluid w-100" alt="Teste dein Deusch">
            <img :src="contactInfo.c1" class="img-fluid w-100" alt="Deutsch Tests online frei">
          </div>
          <div class="col-8">
            <img :src="contactInfo.m1" class="img-fluid w-100" alt="Deutsch Tests online">
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
        en: "a1 german practice test",
        ar: "نماذج امتحان a1",
        fr: "test allemand niveau a1",
        es: "telc a1 modelltest",
        de: "Deutsch-Prüfungen",
      },
      altTextA2: {
        en: "german a2 exam",
        ar: "امتحان جوته a2",
        fr: "niveau a1 allemand test",
        es: "telc a2 modelltest",
        de: "Telc Deutsch",
      },
      altTextB1: {
        en: "german b1 practice test",
        ar: "نماذج امتحان b1 مع الحلول",
        fr: "goethe institut test b1",
        es: "telc b1 zertifikat",
        de: "Goethe Deutsch",
      },
      altTextB2: {
        en: "goethe test b2",
        ar: "نماذج امتحان b2 pdf",
        fr: "goethe examen b2",
        es: "telc b2 zertifikat",
        de: "Teste dein Deusch",
      },
      altTextC1: {
        en: "goethe online test",
        ar: "نموذج امتحان b2 goethe",
        fr: "test de niveau allemand",
        es: "aprender aleman gratis (Learn German Free)",
        de: "Deutsch Tests online frei",
      },
      altTextMain: {
        en: "goethe institut online test",
        ar: "نموذج امتحان b2 goethe",
        fr: "test allemand gratuit",
        es: "telc examen (Broad)",
        de: "Deutsch Tests online",
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
