<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Reservasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img//logos/Hoteliner-logos.jpeg') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="page-top">

    @include('tamu.layouts.navbar2')
    <section class="page-section bg-light d-flex justify-content-center" id="rooms">
        <div class="container d-flex justify-content-center flex-column mt-5" style="margin-inline: 0 !important">
            <div class="text-center mb-3">
                <h2 class="section-heading text-uppercase">Reservasi</h2>
            </div>
            <div class="d-flex">
                <div class="bg-white h-75 shadow-sm" style="width: 60%;">
                    <h4 class="bg-dark text-white p-1 ps-2">Reservasi</h4>
                    <form action="" id="form-pengubahan" data-id="-1">
                        <div id="checkForm" class="d-grid bg-white rounded p-4"
                            style="grid-template-columns: auto 1fr; grid-row-gap: 1em">
                            <h4>Tanggal Check-In</h4>
                            <input onchange="getDetailData(idKamar)" id="checkIn" data-id-rsv="{{ $reservasi->id_rsv }}"
                                class="form-control text-dark w-50 ms-4" name="tgl_in" type="date"
                                placeholder="Tanggal Check-In *" required />
                            <h4>Tanggal Check-Out</h4>
                            <input onchange="getDetailData(idKamar)" id="checkOut"
                                class="form-control text-dark w-50 ms-4" name="tgl_in" type="date"
                                placeholder="Tanggal Check-In *" required />
                            <h4>Catatan : </h4>
                            <div class="form-floating ms-4">
                                <textarea onchange="getDetailData(idKamar)" id="catatan" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea2" style="height: 150px"></textarea>
                                <label for="floatingTextarea2">Catatan</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-white shadow-sm d-flex flex-column h-100 ms-5" style="width: 30%;">
                    <h4 class="bg-dark text-white p-1 ps-2">Detail</h4>
                    <div id="cart" class="d-flex flex-column bg-white px-2">
                    </div>
                    <div id="cartTotalContainer"
                        class="d-flex justify-content-between border-top mt-2 p-3 align-items-center bg-white">
                        <h5 id="cartTotal" class="w-75"></h5>
                        @if (Auth::check())
                            <form action="{{ route('detailReservasiSubmit') }}" method="POST" class="w-25">
                                @csrf
                                <button type="submit" class="w-100 btn btn-warning nav-link text-black fw-bold">Pesan</button>
                            </form>
                        @else
                            <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold" href="/login">Pesan</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('tamu.layouts.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{-- <script src="{{ asset('/js/tamu/scripts.js') }}"></script> --}}
    <script src="{{ asset('/js/tamu/reservasi.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
