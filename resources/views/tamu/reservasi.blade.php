<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Reservasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="page-top">

    @include('tamu.layouts.navbar2')
    <section class="page-section bg-light d-flex justify-content-center" id="rooms">
        <div class="container d-flex justify-content-center flex-column mt-5">
            <div class="text-center mb-2">
                <h2 class="section-heading text-uppercase">Reservasi</h2>
            </div>
            <div class="d-flex">
                <div class="bg-white" style="width: 60%;">
                    <h4 class="bg-dark text-white p-1 ps-2 mt-3 mx-4">Reservasi</h4>
                    <div class="d-grid bg-white rounded p-4" style="grid-template-columns: auto 1fr; grid-row-gap: 1em">
                        <h4>Metode Pembayaran : </h4>
                        <form action="">
                            <div class="d-flex flex-column ms-3">
                                <div class="d-flex form-check">
                                    <input class="form-check-input" type="radio" name="metode-pembayaran"
                                        id="" value="Lorem Ipsum" />
                                    <label class="form-check-label ms-2" for="html">Lorem Ipsum</label><br>
                                </div>
                                <div class="d-flex form-check">
                                    <input class="form-check-input" type="radio" name="metode-pembayaran"
                                        id="" value="Lorem Ipsum" />
                                    <label class="form-check-label ms-2" for="html">Lorem Ipsum</label><br>
                                </div>
                                <div class="d-flex form-check">
                                    <input class="form-check-input" type="radio" name="metode-pembayaran"
                                        id="" value="Lorem Ipsum" />
                                    <label class="form-check-label ms-2" for="html">Lorem Ipsum</label><br>
                                </div>
                            </div>
                        </form>
                        <h4>Fasilitas Tambahan : </h4>
                        <form action="">
                            <div class="d-flex flex-column ms-3">
                                @foreach ($daftarFasilitas as $fasilitas)                                
                                <div class="d-flex form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$fasilitas->id_fasilitas}}"
                                        id="flexCheckDefault" name="fasilitas[]">
                                    <label class="form-check-label ms-2" for="flexCheckDefault">
                                        {{$fasilitas->nama}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </form>
                        <h4>Catatan : </h4>
                        <form action="">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Catatan</label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex border-top justify-content-between p-3">
                        <h4>Total : Rp.500.000</h4>
                        <a class="col-sm-2 btn btn-warning nav-link text-black fw-bold" href="#">Pesan</a>
                    </div>
                </div>
                <div class="bg-white p-3 ms-4 d-flex flex-column" style="width: 40%;">
                    <h4 class="bg-dark text-white p-1 ps-2">Detail</h4>
                    <div class="d-flex justify-content-between">
                        <img class="img-fluid" style="width: 45%;" src="{{ asset('assets/img/rooms/room1.jpg') }}"
                            alt="">
                        <div class="w-50">
                            <h4>{{ $LKamar->nama }}</h4>
                            <p id="harga">{{ $LKamar->harga }}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <h5>Fasilitas Tambahan</h5>
                        <div class="d-flex">
                            <div class="d-flex flex-column border-end">
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item border-0">Extra Bed</li>
                                    <li class="list-group-item border-0">Cras justo odio</li>
                                    <li class="list-group-item border-0">Cras justo odio</li>
                                </ol>
                            </div>
                            <div class="d-flex flex-column">
                                <ol class="list-group list-group-start">
                                    <li class="list-group-item border-0">Rp 100.000</li>
                                    <li class="list-group-item border-0">Rp 100.000</li>
                                    <li class="list-group-item border-0">Rp 100.000</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/tamu/scripts.js') }}"></script>
    <script src="{{ asset('/js/tamu/reservasi.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
