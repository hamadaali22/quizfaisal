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