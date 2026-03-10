<template>
    <div
        v-bind:class="[this.$route.path == '/noresult' || this.$route.path == '/placement-test' || this.$route.path == '/placement-result'  ? 'fixed-bottom' : '']">
        <br><br><br>
        <!-- <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' || this.$route.path =='/goethe-user-exam' ? 'fixed-bottom' : '']"> -->
<!--  -->
            <!--  -->
        <footer class="back navbar ">
            <!-- <div class=" "> -->

            <div class="row col-md-12">
                <div class="col-sm-6 col-md-3 ">
                    <div class="widget widget-about">

                        <div class="links text-center">
                            <img :src="contactInfo.logo" class="footer-logo" alt="“deutschtests Logo" width="100"
                                height="100"><br>

                        </div>
                    </div>
                </div>
                <div class="row col-md-9 col-xs-12 col-sm-6">
                    <div class="col-md-2 d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row ">
                            <div class="p-2">
                                <h6 class="widget-title"><a  href="javascript:void(0)"  @click="goToGoethe">Goethe Tests</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 d-flex flex-column flex-md-row w-100">

                       

                        <div v-for="item in getLevels"
                            :key="item.id"
                            class="d-flex flex-row flex-fill w-100">

                            <div class="p-2 w-100" style="font-size:14px;">
                                <a :href="getLocalizedSlug(item)">
                                    {{ item.name }}
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-2 d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row ">
                            <div class="p-2">
                                <h6 class="widget-title"><a  href="javascript:void(0)" @click="goToTelc"> Telc Tests</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 d-flex flex-column flex-md-row w-100">

                       

                        <div v-for="item in getLevelsTelc"
                            :key="item.id"
                            class="d-flex flex-row flex-fill w-100">

                            <div class="p-2 w-100" style="font-size:14px;">
                                <a :href="getLocalizedSlugTelc(item)">
                                    {{ item.name }}
                                </a>
                            </div>

                        </div>

                    </div>
                    
                </div>
            </div>

        </footer>
        <!-- padding-top: 9px -->
        <div style="background-color: #fff ;">
            <div class="container">
                <div class=" row">
                    <div class="row col-md-10 ">
                        <p style="    margin-left: 5px;margin-top: 10px; margin-bottom:0px;"> Copyright © Deutschtests -
                            All Rights Reserved</p>
                    </div>
                    <div class="links text-center ">
                        <a href="#"><i class="fa-brands fa-facebook p-2 mr-2"
                                style="color:#3e83b3;font-size: 25px !important; "></i></a>
                        <a href="#"><i class="fa-brands fa-instagram p-2 mr-2"
                                style="color:#3e83b3;font-size: 25px !important; "></i></a>
                        <a href="#"><i class="fa-brands fa-twitter p-2 mr-2"
                                style="color:#3e83b3;font-size: 25px !important;"></i></a>
                        <a href="#"><i class="fa-brands fa-github p-2 mr-2"
                                style="color:#3e83b3;font-size: 25px !important;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    mounted() {
        this.$store.dispatch('getContactinfo');
    },

    computed: {
        isLogged() {
            return this.$store.getters.isLogged
        },
        contactInfo() {
            return this.$store.state.contactInfo
        },
        getLevels(){
            return this.$store.state.goethes
        },
        getLevelsTelc(){
            return this.$store.state.telcs
        },
    },
    
    mounted(){
        this.$store.dispatch('getGoethes');
         this.$store.dispatch('getTelcs');
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
        goToGoethe() {
            let lang = this.$i18n.locale;
            const slugs = {
                ar: 'نماذج-امتحانات-معهد-جوته',
                en: 'online-Goethe-exam',
                de: 'goethe-deutsch-test',
                fr: 'goethe-institut-examens',
                es: 'alemán-Goethe-tests'
            };
            const slug = slugs[lang] || slugs['de'];
            return this.$router.push({
                name: 'Levels',
                params: { slug }
            });
        },
        getLocalizedSlugTelc(item) {
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
        goToTelc() {
            let lang = this.$i18n.locale;
            const slugs = {
                ar: 'Telc-نماذج-امتحان',
                en: 'telc-exam-online',
                de: 'deutsch-test-online',
                fr: 'allemand-examens-telc',
                es: 'examen-telc-aleman'
            };

            // 🔹 نحدد الـ slug المناسب بناءً على اللغة
            const slug = slugs[lang] || slugs['de'];

            // 🔹 التوجيه إلى صفحة Goethe المناسبة
            this.$router.push({
                name: 'Telcs',
                params: { slug }
            });
        },
        logout() {
            this.$store.commit('logout')
        }
    }


}
</script>
