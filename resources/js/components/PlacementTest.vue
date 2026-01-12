<template>
    <div>
        
        <section class="row home-main-section p-5 container-fluid" >
            <div class="col-lg m-auto pl-4">
                <p v-html="getPlacementDesc(contactInfo) "></p>
                <router-link v-if="isLogged" :to="'/placement-questions'" class="a-link">
                    <div class="level  w-50 text-center text-light mt-1 pt-2 pb-2">
                         {{ $t('StartTest') }}
                    </div>
                </router-link>
                <router-link v-if="!isLogged" :to="'/login'" class="a-link">
                    <div class="level  w-50 text-center text-light mt-1 pt-2 pb-2">
                         {{ $t('StartTest') }}
                    </div>
                </router-link>
               
            </div>
            <div class="col-lg ">
                
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/deu.jpeg" class="img-fluid w-100"  :alt="altTextdeu[currentLanguage]">
                    </div>
                    <div class="col-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/a1.jpeg" class="img-fluid w-100" :alt="altTextA1[currentLanguage]" style="margin-top: 55px;">
                    </div>
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/a2.jpeg" class="img-fluid w-100"  :alt="altTextA2[currentLanguage]" >
                    </div>
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/c1.jpeg" class="img-fluid w-100"  :alt="altTextC1[currentLanguage]" style="margin-top: 55px;">
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/b1.jpeg" class="img-fluid w-100" :alt="altTextB1[currentLanguage]" style="margin-top: 55px;">
                    </div>
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/b2.jpeg" class="img-fluid w-100"  :alt="altTextB2[currentLanguage]" >
                    </div>
                    <div class="col-4">
                        <img src="https://deutschtests.com/img/PlacementTest/c2.jpeg" class="img-fluid w-100"  :alt="altTextC2[currentLanguage]" style="margin-top: 55px;">
                    </div>
                </div>
               

               
            </div>
<!--  -->
<!--  -->
        </section>
    </div>
</template>
<script>

export default {
    data() {
        return {
            currentLanguage: this.$i18n.locale,
            altTextdeu: {
              en: "German placement test",
              ar: "اختبار مستوى اللغة الالمانية",
              fr: "test de niveau allemand",
              es: "prueba de nivel de alemán",
              de: "Deutsch Einstufungstest",
            },
            altTextA1: {
              en: "Deutsch level test",
              ar: "امتحان تحديد مستوى اللغه الالمانيه ",
              fr: "test niveau allemand ",
              es: "test nivel alemán ",
              de: "Deutsch Niveau Test",
            },
            altTextA2: {
              en: "german language placement test",
              ar: "اختبار تحديد مستوى اللغه الالمانيه",
              fr: "test de langue allemand ",
              es: "examen de aleman ",
              de: "deutsch einstufungstest kostenlos",
            },
            altTextB1: {
              en: "german placement exam",
              ar: "اختبار مستوى اللغة الالمانية",
              fr: "test gratuit allemand",
              es: "test de aleman",
              de: "deutsch test online kostenlos",
            },
            altTextB2: {
              en: "german placement test online",
              ar: "امتحان تحديد مستوى الماني ",
              fr: "test allemand gratuit",
              es: "test de aleman online",
              de: "deutsch einstufungstest online",
            },
            altTextC1: {
              en: "german placement test free",
              ar: "اختبار تحديد مستوى اللغه الالمانيه مجاني ",
              fr: "test allemand niveau",
              es: "test de aleman online a1-c2",
              de: "deutsch einstufungstest online A1-C2",
            },
            altTextC2: {
              en: "language proficiency test german",
              ar: "امتحان تحديد مستوى اللغه الالمانيه مجاني ",
              fr: "test niveau allemand gratuit ",
              es: "examen de aleman A1 -C2",
              de: "deutsch test online kostenlos A1-C2",
            },

        }

    },
    
    computed: {
        isLogged() {
            return this.$store.getters.isLogged
        },
        contactInfo() {
            return this.$store.state.contactInfo
        }
    },

    mounted() {
        this.$store.dispatch('getContactinfo');
    },

    methods: {
        getPlacementDesc(item) {
        const slugs = {
          en: item.placement_desc_en,
          ar: item.placement_desc_ar,
          fr: item.placement_desc_fr,
          es: item.placement_desc_es,
          de: item.placement_desc_de,
        };

        return slugs[this.$i18n.locale] || item.placement_desc_de;
      }
    },


}
</script>