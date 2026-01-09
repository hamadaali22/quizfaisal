<template>
    <div>
        
        <section class="row home-main-section p-5 container-fluid" >
            <div class="col-lg m-auto pl-4">
                <p v-html="getPlacementDesc(contactInfo) "></p>
                
               
            </div>
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
          en: item.terms_en,
          ar: item.terms_ar,
          fr: item.terms_fr,
          es: item.terms_es,
          de: item.terms_de,
        };

        return slugs[this.$i18n.locale] || item.placement_desc_de;
      }
    },


}
</script>