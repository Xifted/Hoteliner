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
        <div class="d-flex justify-content-evenly align-content-evenly mt-4">
            <div class="d-flex bg-white flex-column overflow-hidden shadow-lg py-4"
                style="width: 30%; border-radius: 20px">
                <div class="d-flex justify-content-center border-bottom p-4">
                    <img class="img-fluid rounded-circle h-auto" width="200px"
                        src="{{ asset('assets/img/team/1.jpg') }}" alt="ProfilePic">
                </div>
                <div class="d-flex flex-column p-4 px-5 gap-3">
                    <form class="d-flex flex-column justify-content-evenly gap-3" action="" method="GET">
                        <div class="d-flex justify-content-evenly">
                            <div class="d-flex flex-column justify-content-between w-50"
                                style="align-content: space-evenly">
                                <h5 class="d-flex align-items-center">Profile</h5>
                                <h5 class="d-flex align-items-center">Nama</h5>
                                <h5 class="d-flex align-items-center">Tanggal email</h5>
                                <h5 class="d-flex align-items-center">Tanggal Lahir</h5>
                                <h5 class="d-flex align-items-center">Nomor Telepon</h5>
                            </div>
                            <div class="d-flex flex-column justify-content-evenly gap-3 flex-wrap w-50"
                                style="align-content: space-evenly">
                                <h3 class="section-subheading text-muted text-wrap" style="margin-bottom: 0 !important">
                                    Created At : {{ $dataTamu->created_at }}</h3>
                                <input class="form-control text-dark" name="name" type="text"
                                    value="{{ $dataTamu->nama }}" placeholder="Nama *" required disabled />
                                <input class="form-control text-dark" name="email" type="email"
                                    value="{{ $dataTamu->email }}" placeholder="Email *" required disabled />
                                <input class="form-control text-dark" name="tgl_lahir" type="date"
                                    value="{{ $dataTamu->tgl_lahir }}" placeholder="Tanggal Lahir *" required
                                    disabled />
                                <input class="form-control text-dark" name="no_telp" type="tel"
                                    value="{{ $dataTamu->no_telp }}" placeholder="Nomor Telepon *" required disabled />
                            </div>
                        </div>

                        <div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px" required
                                    disabled>{{ $dataTamu->alamat }}</textarea>
                                <label for="floatingTextarea2">Alamat</label>
                            </div>
                        </div>
                    </form>
                    <button class="col-sm-4 btn btn-warning nav-link text-black fw-bold w-100">EDIT</button>
                </div>
            </div>
            <div class="d-flex bg-white flex-column overflow-hidden shadow-lg" style="width: 60%; border-radius: 20px">
                <h4 class="p-4 px-5 border-bottom">Riwayat Reservasi</h4>
                <div class="d-flex flex-column px-5">
                    <table class="table table-striped rounded">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal Reservasi</th>
                                <th scope="col">Booking Code</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listReservasi as $item)
                                <tr>
                                    <td style="width: 20%">{{ $item->tgl_rsv }}</td>
                                    <td style="width: 30%">{{ $item->booking_code }}</td>
                                    <td id="harga">{{ $item->total_harga }}</td>
                                    <td>{{ $item->status_pembayaran }}</td>
                                    <td class="d-flex flex-column gap-3">
                                        @if ($item->pdf_url == null || $item->pdf_url == 0)
                                        <button class="col-sm-6 btn btn-warning nav-link text-black fw-bold w-100 my-2"><a class="text-black text-decoration-none" href="{{ url('/profile/reservasi/' . $item->id_rsv) }}">Detail</a></button>
                                        @else
                                        <button class="col-sm-6 btn btn-warning nav-link  fw-bold w-100"><a class="text-black text-decoration-none" href="{{ $item->pdf_url }}" target="blank">Payment</a></button>
                                        <button class="col-sm-6 btn btn-warning nav-link text-black fw-bold w-100"><a class="text-black text-decoration-none" href="{{ url('/profile/reservasi/' . $item->id_rsv) }}">Detail</a></button>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-evenly align-items-center justify-content-center border-bottom p-3">
                            <h5 style="width: 20%">{{ $item->tgl_rsv }}</h5>
                            <p style="width: 25%" class="text-wrap">{{ $item->booking_code }}</p>
                            <p id="harga" style="width: 25%" class="text-center">Rp 500.000</p>
                            
                        </div> --}}
                </div>
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
