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
        <title>  Tests</title>
        <meta content="Telc Deutsch-Prüfungen, Telc A1 Prüfung, Telc C1 Prüfung, Tecl C1 hoschole, prüfung telc b1" name="keywords">
        <meta content="Goethe Deutsch-Prüfungen mit Lesenverstehen und Hörenverstehen von Goethe A1 Prüfung bis Goethe C1 Prüfung. Schau unsere Deutsch Tests online an & Test dein Deutsch" name="description">
        <link rel="canonical" href="https://deutschtests.com/goethe-tests"/>
    @elseif(Request::is(['telc-tests']))
        <meta content="Goethe Deutsch-Prüfungen, Goethe A1 Prüfung, Goethe C1 Prüfung, Lesenverstehen üben, deutsch online lernen" name="keywords">
        <meta content="Telc Deutsch-Prüfungen mit Lesenverstehen und Hörenverstehen von Telc A1 Prüfung bis Telc C1 Prüfung. Schau unsere Deutsch Tests online an & Test dein Deutsch" name="description">
        <link rel="canonical" href="https://deutschtests.com/telc-tests"/>
    @endif

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
