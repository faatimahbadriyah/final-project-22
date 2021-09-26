<!DOCTYPE html>
<html>

<head>
    <title>Booking Futsal Online</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js/googlemap.js')}}"></script>
    <!-- Vue JS -->
    <script type="text/javascript" src="{{asset('js/vue/vue.js')}}"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/tambahsewa-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile-style.css')}}">
    <style type="text/css">
        .maps .container-map {
            height: 400px;
            margin: 0%;
            padding: 0%;
            width: 100%;
        }

        #map {
            margin: 0%;
            padding: 0%;
            width: 100%;
            height: 100%;
            border: 1px solid blue;
        }

        #data,
        #allData {
            display: none;
        }

    </style>
</head>

<body>

    <header>
        <h2><a href=" #">Online Booking</a></h2>
        <nav>
            <li><a href="/">Home</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a>
            <li><a href="/profiles">Profil</a></li></li>
            
        </nav>
    </header>


    <section class="banner-area">
        <div class="img-area"></div>
        <div class="banner-text">
            <h1>Futsal Rental 22</h1>
            <!-- <h3>Make it Easy...</h3> -->
            <!-- <a href="/home" class="btn">Get Started</a> -->
        </div>
        <div class="stat" id="stat">
            <div class="content-box">
                <br><br>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="stat-items">
                                <i class="fas fa-users"></i>
                                <h2><span class="counter text-counter">800</span><span>+</span>
                                </h2>
                                <p>Pengguna</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-items">
                                <i class="fas fa-futbol"></i>
                                <h2><span class="counter text-counter">3</span>
                                </h2>
                                <p>Lapangan</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-items">
                                <i class="fas fa-tshirt"></i>
                                <h2><span class="counter text-counter">40</span>
                                </h2>
                                <p>Items</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-items">
                                <i class="fas fa-clock"></i>
                                <h2><span class="counter text-counter">48</span><span>+</span>
                                </h2>
                                <p>Jadwal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="services-area" id="services">
        <h3 class="header-text">Layanan Kami</h3>
        <p>Kami menyediakan layanan lapangan olahraga terbaik untuk Anda </p>
        <div class="content-area">
            <div class="single-service">
                <div class="icon-area">
                    <i class="fas fa-map"></i>
                </div>
                <h2>Lapangan</h2>
                <p>Menyediakan layanan booking lapangan olahraga untuk mendukung rutinitas kegiatan Anda</p>
            </div>
            <div class="single-service">
                <div class="icon-area">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h2>Event Turnamen</h2>
                <p>Memberikan layanan dan harga terbaik untuk Anda yang akan mengadakan acara turnamen olahraga
                </p>
            </div>
            <div class="single-service">
                <div class="icon-area">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <h2>Perlengkapan Olahraga</h2>
                <p>Menyediakan perlengkapan olahraga dengan kualitas terbaik demi kenyamanan Anda</p>
            </div>
        </div>
    </section>

    <footer>
        <p>All Right reserved by &copy; <a href="#">JCC Kelompok 22</a></p>
    </footer>

    <script type="text/javascript">
        window.onload = function () {
            buatId();
        }

    </script>
    <script src="{{asset('/js/profile.js')}}"></script>
    <script src="https://kit.fontawesome.com/3f4aa1c6f5.js" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdg3NKQlbc9sVcuo8aRzLZQLtPoLrPZsw&callback=loadMap"
        async defer></script>
    <!--   Core JS Fi  -->
    <script src="{{asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{asset('js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{asset('js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <!-- <script src="assets/js/demo.js"></script> -->

    <!-- datepicker from gijgo -->
    <script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript">
    </script>
    <link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet"
        type="text/css" />

    <script type="text/javascript">
        $(document).ready(function () {
            $('#date-picker').datepicker({

                uiLibrary: 'bootstrap',
                format: 'yyyy-mm-dd'

            });
        });

    </script>


    <script src="{{asset('js/schedule-script.js')}}"></script>
    <script src="{{asset('js/schedule-back-script.js')}}"></script>
    <script src="{{asset('js/tambahsewa-back-script.js')}}"></script>

    <script>
        jQuery(document).ready(function () {
            $('.counter').counterUp({
                delay: 50,
                time: 1000
            });
        });

    </script>
</body>

</html>
