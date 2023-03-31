<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Transaksi</title>
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
                <h2 class="section-heading text-uppercase">Pembayaran</h2>
            </div>
            <div class="bg-white shadow-sm d-flex flex-column h-100 w-100 ms-5 rounded overflow-hidden">
                <h4 class="bg-dark text-white p-1 ps-2">Detail</h4>
                <div class="d-flex justify-content-between border-bottom p-3">
                    <img class="img-fluid" style="width: 40%;" src="${item.imgUrl}"
                        alt="">
                    <div style="width: 55%;">
                        <h5>${item.namaKamar}</h5>
                        <p>Harga : </p>
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
    <script src="{{ asset('/js/tamu/transaksi.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
