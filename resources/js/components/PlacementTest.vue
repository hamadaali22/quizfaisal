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