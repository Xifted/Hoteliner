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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    @include('tamu.layouts.navbar2')

    <section class="page-section bg-light" id="services">
        <div class="container d-flex justify-content-evenly align-content-evenly mt-4">
            <div class="d-flex bg-white flex-column overflow-hidden shadow-lg" style="width: 100%; border-radius: 20px">
                <h4 class="p-4 px-5 border-bottom">Riwayat Reservasi - {{ $id_rsv }}</h4>
                <div class="d-flex flex-column px-5">
                    <table class="table table-striped rounded">
                        <thead>
                            <tr>
                                <th scope="col">ID Kamar</th>
                                <th scope="col">Nama Kamar</th>
                                <th scope="col">Tanggal Check-In</th>
                                <th scope="col">Tanggal Check-Out</th>
                                <th scope="col">Harga /Kamar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_reservasi as $item)
                                <tr>
                                    <td style="width: 15%">{{ $item->id_kamar }}</td>
                                    <td style="width: 20%">{{ $item->nama_tipe }} - {{ $item->nama_kamar }}</td>
                                    <td style="width: 30%">{{ $item->tgl_in }}</td>
                                    <td id="harga">{{ $item->tgl_out }}</td>
                                    <td>{{ $item->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <a class="col-sm-2 btn btn-warning nav-link fw-bold mb-3 text-black text-decoration-none" href="{{ url('/profile/' . $id_user) }}"><i class="bi bi-box-arrow-left text-black fw-bold"></i> Back</a>
                    {{-- <div class="d-flex justify-content-evenly align-items-center justify-content-center border-bottom p-3">
                            <h5 style="width: 20%">{{ $item->tgl_rsv }}</h5>
                            <p style="width: 25%" class="text-wrap">{{ $item->booking_code }}</p>
                            <p id="harga" style="width: 25%" class="text-center">Rp 500.000</p>
                            
                        </div> --}}
                </div>
            </div>
        </div>
    </section>
    @if (session('alert-success'))
        <script>
            alert("{{ session('alert-success') }}")
        </script>
    @elseif(session('alert-failed'))
        <script>
            alert("{{ session('alert-failed') }}")
        </script>
    @endif
    <!-- Footer-->
    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/tamu/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
</body>

</html>
