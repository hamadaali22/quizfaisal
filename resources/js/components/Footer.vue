<template>
    <div
        v-bind:class="[this.$route.path == '/noresult' || this.$route.path == '/placement-test' || this.$route.path == '/placement-result' || this.$route.path == '/result' ? 'fixed-bottom' : '']">
        <br><br><br>
        <!-- <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' || this.$route.path =='/goethe-user-exam' ? 'fixed-bottom' : '']"> -->

        <footer class="back navbar ">
            <!-- <div class=" "> -->

            <!-- <div class="row col-md-12" style="    padding-right: 0px;">
                        <div class="col-md-2" >
                            <div class="widget widget-about">
                                
                                <div class="links text-center">
                                    <img :src="contactInfo.logo" class="footer-logo" alt="“deutschtests Logo" width="100" height="100"><br>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row p-2 col-md-10" style="    padding-right: 0px;">
                            <div class="row p-2 col-md-10" style="    padding-right: 0px;">
                            <div class="col-md-2 p-1" >
                                <a href="/goethe-tests" style="    font-size: 20px;">Goethe Tests</a>
                            </div>
                           
                            <div class="col-md-2 p-2" >
                                <a href="/goethe-tests/goethe-a1-zertifikat" style="font-size: 14px;">Goethe A1 Zertifikat</a>
                            </div>
                            <div class="d-flex p-2 flex-column">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-3 p-2" >
                                <p><a href="/goethe-tests/goethe-zertifikat-a2" style="font-size: 14px;">Goethe A2 Zertifikat</a> </p>
                            </div>
                            <div class="d-flex flex-column p-2">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-3 p-2 text-center" >
                                <p><a href="/goethe-tests/goethe-b1-modelltest" style="font-size: 14px;">Goethe B1 Modelltest</a></p>
                            </div>
                            <div class="d-flex  p-2 flex-column">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-2 p-2 text-right" >
                                <p><a href="/goethe-tests/goethe-b2-modelltest" style="font-size: 13px;">Goethe B2 Modelltest</a> </p>
                            </div>
                            
                        </div>
                            
                        </div>
                        
                    </div> -->
            <!-- <div class="row col-md-12" style="padding-right: 0px;">
                        <div class="col-md-2" >
                            
                        </div>
                        <div class="row p-2 col-md-10" style="    padding-right: 0px;">
                            <div class="col-md-2 p-1" >
                                <a href="/goethe-tests" style="    font-size: 20px;">Goethe Tests</a>
                            </div>
                           
                            <div class="col-md-2 p-2" >
                                <a href="/goethe-tests/goethe-a1-zertifikat" style="font-size: 14px;">Goethe A1 Zertifikat</a>
                            </div>
                            <div class="d-flex p-2 flex-column">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-2 p-2" >
                                <p><a href="/goethe-tests/goethe-zertifikat-a2" style="font-size: 14px;">Goethe A2 Zertifikat</a> </p>
                            </div>
                            <div class="d-flex flex-column p-2">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-3 p-2 text-center" >
                                <p><a href="/goethe-tests/goethe-b1-modelltest" style="font-size: 14px;">Goethe B1 Modelltest</a></p>
                            </div>
                            <div class="d-flex  p-2 flex-column">
                                <a href="/telc-tests/telc-a2-modelltest">|</a>
                            </div>
                            <div class="col-md-2 p-2 text-right" >
                                <p><a href="/goethe-tests/goethe-b2-modelltest" style="font-size: 13px;">Goethe B2 Modelltest</a> </p>
                            </div>
                            
                        </div>
                    </div> -->
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
                    <div class="d-flex flex-column flex-md-row">
                        <div class="d-flex flex-row ">
                            <div class="p-2">
                                <h6 class="widget-title"><a href="/goethe-tests">Goethe Tests</a></h6>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2" style="font-size: 14px;"><a
                                    href="/goethe-tests/goethe-a1-zertifikat">Goethe A1 Zertifikat</a></div>
                            <div class="p-1"></div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2" style="font-size: 14px;"><a
                                    href="/goethe-tests/goethe-zertifikat-a2">Goethe A2 Zertifikat</a></div>
                            <div class="p-1"></div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2" style="font-size: 14px;"><a
                                    href="/goethe-tests/goethe-b1-modelltest">Goethe B1 Modelltest</a></div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2" style="font-size: 14px;"><a
                                    href="/goethe-tests/goethe-b2-modelltest">Goethe B2 Modelltest</a></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row">

                        <div class="d-flex flex-row ">
                            <div class="p-2"></div>
                            <div class="p-2">
                                <h6 class="widget-title"><a href="/telc-tests"> Telc Tests</a></h6>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2"></div>
                            <div class="p-1"></div>
                            <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-a2-modelltest">Telc A1
                                    Modelltest</a></div>

                        </div>

                        <div class="d-flex flex-row">
                            <div class="p-2"></div>
                            <div class="p-1"></div>
                            <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-a2-modelltest">Telc A2
                                    Modelltest </a></div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2"></div>
                            <div class="p-1"></div>
                            <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-b1-modelltest">Telc B1
                                    Modelltest</a></div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2"></div>
                            <div class="p-1"></div>
                            <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-b2-modelltest"> Telc B2
                                    Modelltest </a></div>
                        </div>
                    </div>
                    <!-- <div class="d-flex flex-column flex-md-row">
                                <div class="d-flex flex-row ">
                                    <div class="p-2"><h6 class="widget-title" ><a href="/goethe-tests">Goethe Tests</a></h6></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2" style="font-size: 14px;"><a href="/goethe-tests/goethe-a1-zertifikat" >Goethe A1 Zertifikat</a></div>
                                    <div class="p-1"></div><div class="p-2"><a href="#">|</a></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2" style="font-size: 14px;"><a href="/goethe-tests/goethe-zertifikat-a2">Goethe A2 Zertifikat</a></div>
                                    <div class="p-1"></div><div class="p-2"><a href="#">|</a></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2" style="font-size: 14px;"><a href="/goethe-tests/goethe-b1-modelltest">Goethe B1 Modelltest</a></div>
                                    <div class="p-2"><a href="#">|</a></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-2" style="font-size: 14px;"><a href="/goethe-tests/goethe-b2-modelltest">Goethe B2 Modelltest</a></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-md-row">
                                
                                <div class="d-flex flex-row ">
                                    <div class="p-2"><h6 class="widget-title" ><a href="/telc-tests">Telc Tests</a></h6></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-1"></div>
                                    <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-a2-modelltest">Telc A1 Modelltest</a></div>
                                    <div class="p-2"><a href="#">|</a></div>
                                </div>
                               
                                <div class="d-flex flex-row">
                                    <div class="p-1"></div>
                                    <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-a2-modelltest">Telc A2 Modelltest </a></div>
                                    <div class="p-2"><a href="#">|</a></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-1"></div>
                                    <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-b1-modelltest">Telc B1 Modelltest</a></div>
                                    <div class="p-2"><a href="#">|</a></div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="p-1"></div>
                                    <div class="p-2" style="font-size: 14px;"><a href="/telc-tests/telc-b2-modelltest">Telc B2 Modelltest </a></div>
                                </div>
                            </div> -->
                </div>



                <!-- <div class="d-flex flex-row">
                                <div class="p-2"><h5 class="widget-title"><a href="/goethe-tests">Goethe Tests</a></h5></div>
                                <div class="p-2"><a href="/goethe-tests/goethe-a1-zertifikat" >Goethe A1 Zertifikat</a></div>
                                <div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/goethe-tests/goethe-zertifikat-a2">Goethe A2 Zertifikat</a></div>
                                <div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/goethe-tests/goethe-b1-modelltest">Goethe B1 Modelltest</a></div>
                                <div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/goethe-tests/goethe-b2-modelltest">Goethe B2 Modelltest</a></div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="p-2"><h5 class="widget-title"><a href="/telc-tests">Telc Tests</a></h5></div>
                                <div class="p-2"></div><div class="p-1"></div>
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">Telc A1 Modelltest</a></div>
                                <div class="p-2"></div><div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">Telc A2 Modelltest </a></div>
                                <div class="p-2"></div><div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/telc-tests/telc-b1-modelltest">Telc B1 Modelltest</a></div>
                                <div class="p-2"></div><div class="p-1"></div><div class="p-2"><a href="#">|</a></div>
                                <div class="p-2"><a href="/telc-tests/telc-b1-modelltest">Telc B1 Modelltest</a></div>
                            </div> -->

                <!-- <div class="d-flex  flex-column">
                                <div class="p-2"><h5 class="widget-title"><a href="/goethe-tests">Goethe Tests</a></h5></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/goethe-tests/goethe-a1-zertifikat" style="font-size: 14px;">Goethe A1 Zertifikat</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">|</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/goethe-tests/goethe-zertifikat-a2">Goethe A2 Zertifikat</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">|</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/goethe-tests/goethe-b1-modelltest">Goethe B1 Modelltest</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">|</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/goethe-tests/goethe-b2-modelltest">Goethe B2 Modelltest</a></div>
                            </div>
                            <div class="d-flex  flex-column">
                                <div class="p-2"><h5 class="widget-title"><a href="/telc-tests">Telc Tests</a></h5></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"> </div>
                            </div>
                            
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">Telc A1 Modelltest</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-1"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">|</a></div>
                            </div>
                           
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">Telc A2 Modelltest </a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest">|</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-b1-modelltest">Telc B1 Modelltest</a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-a2-modelltest"> | </a></div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="p-2"><a href="/telc-tests/telc-b2-modelltest">Telc B2 Modelltest </a></div>
                            </div> -->
                <!-- </div> -->

            </div>
            <!-- <div class=" row">
                                <div class="p-2 row col-md-2" >
                                    
                                </div>
                                <div class="p-2 row col-md-7" style="color: #fff;">
                                    <p>Copyright © deutschtest - All Rights Reserved</p>
                                </div>
                                <div class="links text-center">
                                    <a href="#"><i class="fa-brands fa-facebook p-2 mr-2"></i></a>
                                            <a href="#"><i class="fa-brands fa-instagram p-2 mr-2"></i></a>
                                            <a href="#"><i class="fa-brands fa-twitter p-2 mr-2"></i></a>
                                            <a href="#"><i class="fa-brands fa-github p-2 mr-2"></i></a>
                                    
                                </div>
                            </div> -->
            <!-- </div> -->

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
        <!-- <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' || this.$route.path =='/goethe-user-exam' ? 'fixed-bottom' : '']">
                <div class="container ">
                    <div class="row col-md-12" style="font-size: 15px;">
                        <div class="col-sm-6 col-md-3">
                            <div class="widget widget-about">
                               
                                <div class="links text-center">
                                    <img :src="contactInfo.logo" class="footer-logo" alt="“deutschtests Logo" width="80" height="80"><br>
                                    <a href="#"><i class="fa-brands fa-facebook p-2 mr-2"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram p-2 mr-2"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter p-2 mr-2"></i></a>
                                    <a href="#"><i class="fa-brands fa-github p-2 mr-2"></i></a>
                                </div>
                            </div>
                        </div>
                    <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                <h4 class="widget-title"><a href="/goethe-tests">Goethe Tests</a></h4>
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/goethe-tests/goethe-a1-zertifikat">Goethe a1 zertifikat</a></li>
                                    <li><a href="/goethe-tests/goethe-zertifikat-a2">Goethe zertifikat a2</a></li>
                                    <li><a href="/goethe-tests/goethe-b1-modelltest">goethe b1 modelltest</a></li>
                                    <li><a href="/goethe-tests/goethe-b2-modelltest">goethe b2 modelltest</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                <h4 class="widget-title"><a href="/telc-tests">Telc Tests </a></h4>
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/telc-tests/telc-a1-modelltest">telc a1 modelltest</a></li>
                                    <li><a href="/telc-tests/telc-a2-modelltest">telc a2 modelltest</a></li>
                                    <li><a href="/telc-tests/telc-b1-modelltest">telc-b1-modelltest</a></li>
                                    <li><a href="/telc-tests/telc-b2-modelltest">telc b2 modelltest</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                <h4 class="widget-title"><a href="/">DeutschTests</a></h4>
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/register">Register</a></li>
                                    <li><a href="/login">Anmelden</a></li>
                                    <li><a href="/goethe-user-exam">My scores</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
        </footer> -->
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
        }
    },
    methods: {
        logout() {
            this.$store.commit('logout')
        }
    }


}
</script>
