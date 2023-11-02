<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{asset('front/bootstrap-4.0.0-dist/css/bootstrap.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{asset('front/quiz.css')}}">

  <link rel="shortcut icon" href="{{asset('img/settings/'.$contact->favicon) }}">
    @if(Request::is(['/']))
        <title> Deutsch Tests online |Deutsch-Prüfungen</title>
        <meta content=" Deutsch Tests online, Deutsch-Prüfungen, Goethe Deutsch, Telc Deutsch, Teste dein Deutsch" name="keywords">
        <meta content="Goethe Deutsch-Prüfungen und Telc Deutsch-Prüfungen zum Üben. Das Ergebnis erscheint am Prüfungsende. Schau unsere Deutsch Tests online an und Teste dein Deutsch!" name="description">
        <link rel="canonical" href="https://deutschtests.com"/>
    @elseif(Request::is(['goethe-tests']))
        <title>Goethe Deutsch-Prüfungen von Goethe A1 bis Goethe C1 Prüfung</title>
        <meta content="Goethe Deutsch-Prüfungen, Goethe A1 Prüfung, Goethe C1 Prüfung, Lesenverstehen üben, deutsch online lernen" name="keywords">
        <meta content="Goethe Deutsch-Prüfungen mit Lesenverstehen und Hörenverstehen von Goethe A1 Prüfung bis Goethe C1 Prüfung. Schau unsere Deutsch Tests online an & Test dein Deutsch" name="description">
        <link rel="canonical" href="https://deutschtests.com/goethe-tests"/>
    @if(request()->path()=='goethe-tests/goethe-a1-zertifikat')
      <title>Goethe Prüfung A1 | Goethe A1 Zertifiakt</title>
      <meta content="goethe prüfung a1, prüfung a1 goethe, goethe a1 zertifikat, a1 goethe prüfung, Start deutsch A1" name="keywords">
      <meta content="Modelltests für Goethe Prüfung A1. Sie können hier für Start Deutsch A1 üben. Bereiten Sie sich auf Goethe A1 Zertifiakt vor! Ihr Ergebnis erfahren sofort." name="description">
      <link rel="canonical" href="https://deutschtests.com/goethe-tests/goethe-a1-zertifikat"/>
    @endif
    @if(request()->path()=='goethe-tests/goethe-zertifikat-a2')
        <title>Goethe A2 Prüfung | goethe zertifikat A2</title>
        <meta content="Goethe A2 Prüfung, A2-Deutsch-Test, Goethe Zertifikat A2, Goethe A2 Test, Prüfung A2 Goethe" name="keywords">
        <meta content=" Modelltests für Goethe A2 Prüfung.Sie können hier für die Prüfung A2 Goethe üben. Bereiten Sie sich auf goethe zertifikat A2 vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/goethe-tests/goethe-zertifikat-a2"/>
    @endif
    @if(request()->path()=='goethe-tests/goethe-b1-modelltest')
        <title> Goethe B1 Prüfung | Goethe B1 Modelltest </title>
        <meta content="Goethe B1 Prüfung, Goethe Zertifikat B1, B1 Prüfung Goethe, B1 Goethe Prüfung, Goethe B1 Modelltest" name="keywords">
        <meta content="Modelltests für Goethe B1 Prüfung. Sie können hier für die Prüfung B1 Goethe üben. Bereiten Sie sich mit einem Goethe B1 Modelltest vor und erfahren Sie Ihr Ergebnis sofort. " name="description">
        <link rel="canonical" href="https://deutschtests.com/goethe-tests/goethe-b1-modelltest"/>
    @endif
    @if(request()->path()=='goethe-tests/goethe-b2-modelltest')
        <title> Goethe B2 Prüfung| Goethe B2 Modelltest</title>
        <meta content="Goethe B2 Prüfung, Prüfung B2 Goethe, B2 Goethe Prüfung, Prüfung Goethe B2, Goethe B2 Modelltest" name="keywords">
        <meta content="Modelltests für Goethe B2 Prüfung.Sie können hier für die Prüfung B2 Goethe üben. Bereiten Sie sich mit einem Goethe B2 Modelltest vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/goethe-tests/goethe-b2-modelltest"/>
    @endif
<!-- telc -->
    @elseif(Request::is(['telc-tests']))
        <title>Telc Deutsch-Prüfungen | Telc A1 Prüfung bis Telc C1 Prüfung</title>
        <meta content="Telc Deutsch-Prüfungen, Telc A1 Prüfung, Telc C1 Prüfung, Tecl C1 hoschole, prüfung telc b1" name="keywords">
        <meta content="Telc Deutsch-Prüfungen mit Lesenverstehen und Hörenverstehen von Telc A1 Prüfung bis Telc C1 Prüfung. Schau unsere Deutsch Tests online an & Test dein Deutsch" name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests"/>
    @endif
    @if(request()->path()=='telc-tests/telc-a1-modelltest')
        <title> Telc A1 Prüfung |Telc A1 Modelltest </title>
        <meta content="telc a1 prüfung, telc a1 zertifikat, a1 telc prüfung, Telc A1 Modelltest, A1 Deutsch-Test" name="keywords">
        <meta content=" Modelltests für Telc A1 Prüfung.Sie können hier für A1 Telc Prüfung üben. Bereiten Sie sich mit einem Telc A1 Modelltest vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests/telc-a1-modelltest"/>
    @endif
    @if(request()->path()=='telc-tests/telc-a2-modelltest')
        <title>Telc A2 Prüfung | telc a2 modelltest </title>
        <meta content=" Telc A2 Prüfung, A2 Telc Prüfung, Prüfung A2 Telc, telc a2 modelltest, Telc A2 Zertifikat" name="keywords">
        <meta content=" Modelltests für Telc A2 Prüfung.Sie können hier für die Prüfung A2 Telc üben. Bereiten Sie sich mit einem Telc A2 Modelltest vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests/telc-a2-modelltest"/>
    @endif
    @if(request()->path()=='telc-tests/telc-b1-modelltest')
        <title> Telc B1 Prüfung  | Telc B1 Modelltest</title>
        <meta content="Telc B1 Prüfung, Prüfung Telc B1, B1 Telc Prüfung, Telc B1 Modelltest, B1 Deutsch-Test " name="keywords">
        <meta content=" Modelltest für Telc B1 Prüfung. Sie können hier für die Prüfung B1 Telc  üben. Bereiten Sie sich mit einem Telc B1 Modelltest vor und erfahren Sie Ihr Ergebnis sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests/telc-b1-modelltest"/>
    @endif
    @if(request()->path()=='telc-tests/telc-b2-modelltest')
        <title> Telc B2 Prüfung | Telc B2 Modelltest</title>
        <meta content="B2 Deutsch-Test, Telc B2 Prüfung, B2 Telc Prüfung, Telc B2 Modelltest, Prüfung Telc B2 " name="keywords">
        <meta content=" Modelltests für Telc B2 Prüfung.Sie können hier für die Prüfung B2 Telc üben. Bereiten Sie sich mit einem Telc B2 Modelltest vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests/telc-b2-modelltest"/>
    @endif


    <!--{{request()->path()}}-->
    <!--@if(request()->is('goethe-tests/*'))-->
    <!--    <title> Goethe Prüfung A1 | Prüfung A1 Goethe </title>-->
    <!--    <meta content=" goethe prüfung a1, prüfung a1 goethe, goethe a1 zertifikat, a1 goethe prüfung, Start deutsch A1" name="keywords">-->
    <!--    <meta content=" Modelltests für Goethe Prüfung A1. Sie können hier für Start Deutsch A1 üben. Bereiten Sie sich auf Goethe A1 Zertifiakt vor! Ihr Ergebnis erfahren sofort. " name="description">-->
    <!--    <link rel="canonical" href="https://deutschtests.com/goethe-tests/Start-deutsch-A1"/>-->
    <!--@endif-->
    <!-- @if(request()->is('telc-tests/*'))
        <title> Telc A1 Prüfung |Telc A1 Modelltest </title>
        <meta content="telc a1 prüfung, telc a1 zertifikat, a1 telc prüfung, Telc A1 Modelltest, A1 Deutsch-Test" name="keywords">
        <meta content=" Modelltests für Telc A1 Prüfung.Sie können hier für A1 Telc Prüfung üben. Bereiten Sie sich auf Telc A1 Zertifikat vor! Ihr Ergebnis erfahren Sie sofort." name="description">
        <link rel="canonical" href=" https://deutschtests.com/telc-tests/A1-Deutsch-Test"/>
    @endif -->
    <!-- <title>{{URL::current()}}</title> -->
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XM2JPDHKJE"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XM2JPDHKJE');
</script>


   <style>
       .back{
           background-color: #3d83b3;
       }
       footer .links a i{
           font-size: 25px !important;
           color: #fff !important;
       }
       .next h3{
           width: fit-content;
           cursor: pointer;
       }
       .next h3:hover{
           opacity: 0.8;
       }

       .multi-item img:hover{
                   scale: 1.4;
               }
               .main-text img{
                   width: 100%;
               }
   </style>
