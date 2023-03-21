<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img//logos/Hoteliner-logos.jpeg') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="page-top">

    @include('tamu.layouts.navbar2')
    <section class="page-section bg-light d-flex justify-content-center" id="rooms">
        <div class="container-fluid px-5 mt-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Rooms</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="d-flex flex-row-reverse mb-5 me-4">
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
            <div class="container-fluid d-flex flex-row justify-content-between flex-fill px-0">
                <div class="col-sm-8">
                    @foreach ($LTipe as $LTipe)
                        <div
                            class="d-flex p-2 border-bottom border-top justify-content-between mb-2 p-3 flex-wrap bg-white">
                            <img class="col-sm-5 img-fluid" src="{{ $LTipe->img_url }}" alt="Tipe">
                            <div class="d-flex col-sm-6 flex-column justify-content-between flex-wrap">
                                <div class="text-wrap">
                                    <h4>{{ $LTipe->nama }}</h4>
                                    <p>{{ $LTipe->deskripsi }}</p>
                                    <p class="fw-bold">{{$KQty[$LTipe->id_tipe]??0 ? "Tersedia : " . $KQty[$LTipe->id_tipe] : "Status : Tidak Tersedia"}}</p>
                                    {{-- <ol class="list-group">
                                    @foreach ($daftarFasilitas as $Fasilitas)
                                    <li class="list-group-item border-0">{{$Fasilitas->nama}}</li>    
                                    @endforeach
                                </ol> --}}
                                </div>
                                <div class="d-flex flex-row justify-content-between w-100" style="">
                                    <p class="fw-bold room-price">{{ $LTipe->harga }}</p>
                                    @if (Auth::check())
                                        @if ($KQty[$LTipe->id_tipe]??0)
                                        <button id="tambahBtn"
                                        class="col-sm-4 btn btn-warning nav-link text-black fw-bold"
                                        onclick="addCartItem(this)" data-id-tipe="{{ $LTipe->id_tipe }}"
                                        data-img-url="{{ $LTipe->img_url }}" data-nama-kamar="{{ $LTipe->nama }}"
                                        data-harga-kamar="{{ $LTipe->harga }}"
                                        data-max-qty="{{ $KQty[$LTipe->id_tipe]??0 }}">Tambah</button>
                                        @else
                                        <button class="col-sm-4 btn btn-warning nav-link text-black fw-bold" disabled>Tidak Tersedia</button>
                                        @endif
                                    @else
                                        <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold"
                                            href="/login">Tambah</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="bg-light shadow-sm d-flex flex-column h-100" style="width: 30%;">
                    <h4 class="bg-dark text-white p-1 ps-2">Detail</h4>
                    <div id="cart" class="d-flex flex-column">
                        {{-- <div class="d-flex justify-content-between border-top border-bottom p-3">
                            <img class="img-fluid" style="width: 40%;" src="{{ asset('assets/img/rooms/room1.jpg') }}"
                                alt="">
                            <div style="width: 55%;">
                                <h5>Standard Room</h5>
                                <p>Rooms : 2</p>
                                <p id="harga">Rp 500.000</p>
                            </div>
                        </div> --}}
                    </div>
                    <div id="cartTotalContainer"
                        class="d-flex justify-content-between border-top mt-2 p-3 align-items-center">
                        <h5 id="cartTotal"></h5>
                        @if (Auth::check())
                            <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold"
                                href="{{ url('rooms/reservasi/action') }}">Pesan</a>
                        @else
                            <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold" href="/login">Pesan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
