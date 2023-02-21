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
                <h2 class="section-heading text-uppercase">Rooms</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="d-flex flex-row-reverse mb-5">
                <div class="input-group rounded w-25">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search text-primary"></i>
                    </span>
                </div>
                <div class="dropdown me-5">
                    <a class="btn btn-primary text-dark dropdown-toggle" href="#">
                        Sort By
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="container d-flex flex-column justify-content-between flex-fill px-0">
                @foreach ($LKamar as $LKamar)
                    <div class="d-flex p-2 border-bottom border-top justify-content-between mb-2 col-sm-11 p-3">
                        <img class="col-sm-5 img-fluid" src="assets/img/rooms/room1.jpg" alt="">
                        <div class="d-flex col-sm-6 flex-column justify-content-between flex-wrap">
                            <div>
                                <h4>{{ $LKamar->nama }}</h4>
                                <p>{{ $LKamar->deskripsi }}</p>
                                <p class="fw-bold">Status : {{ $LKamar->status }}</p>
                            </div>
                            <div class="d-flex flex-row justify-content-between w-100" style="">
                                <p class="fw-bold room-price">{{ $LKamar->harga }}</p>
                                <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold"
                                    href="{{ url('rooms/reservasi/' . $LKamar->id_kamar) }}">Pesan</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core theme JS-->
    {{-- <script src="{{ asset('/js/tamu/scripts.js')}}"></script> --}}
    <script src="{{ asset('/js/tamu/rooms.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
