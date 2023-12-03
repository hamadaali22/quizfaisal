
<template>
    <div>
        <br><br><br>
        <footer class="back navbar " v-bind:class="[this.$route.path == '/noresult' || this.$route.path =='/goethe-user-exam' ? 'fixed-bottom' : '']">
                <div class="container ">
                    <div class="row col-md-12" style="font-size: 15px;">
                        <div class="col-sm-6 col-md-3">
                            <div class="widget widget-about">
                                <!--<img src="{{asset('img/settings/'.$contact->logo) }}" class="footer-logo" alt="Footer Logo" width="80" height="80">-->
                                <!-- <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p> -->
                                <!-- <div class="widget-call">
                                    <i class="icon-phone"></i>
                                    Got Question? Call us 24/7
                                    <a href="tel:#">+0123 456 789</a>
                                </div> -->
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
                                <h4 class="widget-title"><a href="/goethe-tests">Goethe Tests</a></h4><!-- End .widget-title -->
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/goethe-tests/goethe-a1-zertifikat">Goethe a1 zertifikat</a></li>
                                    <li><a href="/goethe-tests/goethe-zertifikat-a2">Goethe zertifikat a2</a></li>
                                    <li><a href="/goethe-tests/goethe-b1-modelltest">goethe b1 modelltest</a></li>
                                    <li><a href="/goethe-tests/goethe-b2-modelltest">goethe b2 modelltest</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                <h4 class="widget-title"><a href="/telc-tests">Telc Tests </a></h4><!-- End .widget-title -->
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/telc-tests/telc-a1-modelltest">telc a1 modelltest</a></li>
                                    <li><a href="/telc-tests/telc-a2-modelltest">telc a2 modelltest</a></li>
                                    <li><a href="/telc-tests/telc-b1-modelltest">telc-b1-modelltest</a></li>
                                    <li><a href="/telc-tests/telc-b2-modelltest">telc b2 modelltest</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget">
                                <h4 class="widget-title"><a href="/">DeutschTests</a></h4><!-- End .widget-title -->
                                <ul class="widget-list" style="list-style: none ;">
                                    <li><a href="/register">Register</a></li>
                                    <li><a href="/login">Anmelden</a></li>
                                    <li><a href="/goethe-user-exam">My scores</a></li>

                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div>
                    </div>
                    <!-- <div class="links text-center">
                        <a href="#"><i class="fa-brands fa-facebook p-2 mr-2"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram p-2 mr-2"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter p-2 mr-2"></i></a>
                        <a href="#"><i class="fa-brands fa-github p-2 mr-2"></i></a>
                    </div> -->
                </div>
        </footer>
    </div>
  </template>
  
  
<script>
export default {
  mounted(){
    this.$store.dispatch('getContactinfo');
  },
 
  computed:{
    isLogged(){
      return this.$store.getters.isLogged
    },
    contactInfo(){
      return this.$store.state.contactInfo
    }
  },
  methods:{
    logout(){
       this.$store.commit('logout')
    }
  }


}
</script>
