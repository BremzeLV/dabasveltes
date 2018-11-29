<!doctype html>
<html lang="{{ app()->getLocale() }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> DabasVeltes.me  </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- CSS -->
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/responsive.css') }}">

    <!-- Js -->
    <script src="{{ asset('js/welcome/vendor/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js/welcome/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/welcome/wow.min.js') }}"></script>
    <script src="{{ asset('js/welcome/main.js') }}"></script>

    <script>
        new WOW(
        ).init();
    </script>


    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1058930,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127847977-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-127847977-1');
    </script>

</head>
    <body>
    <header>
        <div id="download" class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 order-sm-1 order-12">
                    <div class="app-showcase wow fadeInDown" data-wow-delay=".3s">
                        <img src="images/iphone.png" alt="">
                    </div>

                </div>
                <div class="col-md-6 col-sm-6 order-sm-12 order-1">
                    <div class="block wow fadeInRight" data-wow-delay=".5s">
                        <a class="logo" href="#">
                            <img src="images/SMALL-06.png" alt="">
                        </a>
                        <div class="download-btn">
                            <div class="btn btn-success">
                                <a style="color:#fff;" href="{{ route('register') }}">Reģistrēties</a>
                            </div>
                            <div class="btn btn-primary">
                                <a style="color:#fff;" href="{{ route('login') }}">Pieslēgties</a>
                            </div>
                        </div>
                        <h2>Lokāli audzētu produktu karte.</h2>
                        <p>Atrodu sev blakus audzētus produktus.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title wow pulse" data-wow-delay=".3s">
                        <h2>Atrodi savu audzētāju un seko līdzi produktam</h2>
                        <p>
                            DabasVeltes ir platforma, kas ļauj sekot līdzi Tevis izvēlētiem produktiem no dažādiem Latvijas audzētājiem, saņemt paziņojumus par produktu gatavību un rada jaunus veidus, kā būt saistītam ar savu vietējo ēdienu.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="block wow fadeInLeft" data-wow-delay=".3s">
                        <img src="images/WEB3.png" alt="">
                        <h3>Patērētājs</h3>
                        <p>
                            Tiek dota labāka piekļuve lokālam, svaigam ēdienam. Iespēja kļūt par audzetāju tikai pāris klikšķu attālumā.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="block wow fadeInLeft" data-wow-delay=".3">
                        <img src="images/WEB2.png" alt="">
                        <h3>Audzētājs</h3>
                        <p>
                            Tiek sniegtas iespējas pārvērst savu hobiju par biznesu, vai arī vienkārši - dalīties vai mainīties ar to, ko pats izaudzē.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="block wow fadeInLeft" data-wow-delay=".7">
                        <img src="images/WEB4.png" alt="">
                        <h3>Saimniecības</h3>
                        <p>
                            Iespēja piesaistīt vairāk klientu, informēt klientu par produktu gatavību un informēt klientu par dažādu pasākumu rīkošanu no uzņemuma puses.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="showcase">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center wow fadeInUp" data-wow-delay=".3s">
                        <img src="images/WEB1.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title wow pulse" data-wow-delay=".5s">
                        <h2>Lokāli audzētu produktu izvēle palīdz atbalstīt Latvijas audzētājus</h2>
                        <p>
                            Atbslsti arī Tu, izvēloties lokāli audzētu pārtiku. Lejupielādē DabasVeltes un atrodi savu iecienītāko produktu.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="block">
                        <div class="media wow fadeInDown" data-wow-delay=".2s">
                            <img class="media-object pull-left" src="images/item-1.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Liela produktu izvēle</h4>
                                <p>Platformā spēsi atrast sev iecienītākos produktus bez liekas piepūles.</p>
                            </div>
                        </div>
                        <div class="media wow fadeInDown" data-wow-delay=".3s">
                            <img class="media-object pull-left" src="images/item-2.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Veido kopienu</h4>
                                <p>Palīdz veidot kopienu starp ražotājiem un patērētājiem.</p>
                            </div>
                        </div>
                        <div class="media wow fadeInDown" data-wow-delay=".4s">
                            <img class="media-object pull-left" src="images/item-3.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Ātra komunikācija</h4>
                                <p>Sistēma sniedz iespēju izsūtīt un saņemt paziņojumus par piesekotajiem produktiem.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="block">
                        <div class="media wow fadeInDown" data-wow-delay=".5s">
                            <img class="media-object pull-left" src="images/item-4.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Pasākumi</h4>
                                <p>Informācija par ražotāja pasākumiem un iespējamām ražotāja vai audzētāja tirgošanās lokācijām.</p>
                            </div>
                        </div>
                        <div class="media wow fadeInDown" data-wow-delay=".6s">
                            <img class="media-object pull-left" src="images/item-5.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Ietaupi laiku</h4>
                                <p>Ietaupi laiku vietēji audzētu produktu meklēšanā.</p>
                            </div>
                        </div>
                        <div class="media wow fadeInDown" data-wow-delay=".7s">
                            <img class="media-object pull-left" src="images/item-6.png" alt="Image">
                            <div class="media-body">
                                <h4 class="media-heading">Pārskati</h4>
                                <p>Gan patērētājam, gan audzētājam pieejami dažādi pārskati par produktiem un produktu aktivitātēm starp patērētājiem.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div id="owl-example" class="owl-carousel">
                            <div>
                                <h5>
                                    “Aplikācija radīja iepspēju kontaktēties ar produktu ražotāju daudz personiskāk un efektīvāk.” <span>Everts / Aplikācijas lietotājs</span>

                                </h5>

                            </div>
                            <div>
                                <h5>
                                    “Šī lietotne sniedz iespēju manu hobiju pārvērst par pelnošu biznesu. Paldies!”  <span>Anna / Aplikācijas lietotājs</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">
                                    <img src="images/SMALL-07.png" alt="">
                                </a>
                            </div>

                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>