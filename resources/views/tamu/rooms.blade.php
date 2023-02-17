<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="page-top">

    @include('tamu.layouts.navbar2')
    <section class="page-section bg-light d-flex justify-content-center" id="rooms">
        <div class="container mx-0 mt-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">rooms</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>

            <div class="container d-flex flex-column justify-content-between flex-fill px-0">
                @foreach ($LKamar as $LKamar)
                    <div class="d-flex p-2 border-bottom border-top justify-content-between mb-2 col-sm-11 p-3">
                        <img class="col-sm-5 img-fluid" src="assets/img/rooms/room1.jpg" alt="">
                        <div class="d-flex col-sm-6 flex-col align-content-between flex-wrap">
                            <div>
                                <h4>{{ $LKamar->nama }}</h4>
                                <p>{{ $LKamar->deskripsi }}</p>
                                <p class="fw-bold">Status : {{ $LKamar->status }}</p>
                            </div>
                            <div class="d-flex flex-row flex-fill justify-content-between">
                                <p class="fw-bold">Rp.{{ $LKamar->harga }}/Malam</p>
                                <a class="col-sm-5 btn btn-warning nav-link text-black fw-bold" href="#">Pesan</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
