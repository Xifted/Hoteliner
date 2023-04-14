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

<body class="page-top">

    <section class="page-section mt-0 bg-light d-flex justify-content-center" id="rooms">
        <div class="container-fluid px-5 mt-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Hoteliner - Rooms</h2>
                <h3 class="section-subheading text-muted">Kamar Hotel Terbaik dan Ternyaman.</h3>
            </div>
            <div class="d-flex flex-row justify-content-between mb-5">
                <div class="input-group w-50 gap-3">
                    <button class="col-sm-4 btn btn-warning nav-link text-black fw-bold rounded d-flex justify-content-center gap-1" href="?id_kamar="><i class="bi bi-box-arrow-in-left fw-bold fs-4"></i><a href="/admin-dashboard/" class="h-100 text-black fw-bold text-decoration-none d-flex justify-content-center align-items-center">Back to Admin Dashboard</a></button>
                    <button onclick="document.getElementById('modal').style.display='flex'" class="col-sm-4 btn btn-warning nav-link text-black fw-bold rounded d-flex justify-content-center align-items-center gap-1" href="?id_kamar="><i class="bi bi-plus fs-4"></i>Add Rooms</button>
                </div>
                <div class="input-group rounded w-25" style="height: fit-content;">
                    <form class="d-flex w-100" action="/rooms/cari" method="GET">
                        <input type="search" name="cari" class="form-control border-0 shadow-sm"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search text-white shadow-sm"></i>
                        </button>
                    </form>
                </div>
                {{-- <div class="dropdown me-5">
                    <a class="btn btn-primary text-dark dropdown-toggle" href="#">
                        Sort By
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> --}}
            </div>
            <div class="container-fluid d-flex flex-row justify-content-between flex-fill px-0">
                <div class="col-sm-8 w-100">
                    @foreach ($LTipe as $LTipe)
                        <div
                            class="d-flex p-2 border-bottom border-top justify-content-between mb-2 p-3 flex-wrap bg-white">
                            <img class="col-sm-5 img-fluid" src="{{ $LTipe->img_url }}" alt="Tipe">
                            <div class="d-flex col-sm-6 flex-column justify-content-between flex-wrap">
                                <div class="text-wrap">
                                    <h4>{{ $LTipe->nama }} - {{ $LTipe->namaKamar }}</h4>
                                    <p>{{ $LTipe->deskripsi }}</p>
                                    <h6>Status : {{ $LTipe->statusKamar }}</h6>
                                    {{-- <p class="fw-bold">
                                        {{ $KQty[$LTipe->id_tipe] ?? 0 ? 'Tersedia : ' . $KQty[$LTipe->id_tipe] : 'Status : Tidak Tersedia' }}
                                    </p> --}}
                                </div>
                                <div class="d-flex flex-row justify-content-between w-100" style="">
                                    <p class="fw-bold room-price">{{ $LTipe->harga }}</p>
                                    <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold"
                                        href="?id_kamar={{ $LTipe->id_kamar }}">Edit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="bg-light shadow-sm d-flex flex-column h-100" style="width: 30%;">
                    <h4 class="bg-dark text-white p-1 ps-2">Detail</h4>
                    <div id="cart" class="d-flex flex-column">
                        <div class="d-flex justify-content-between border-top border-bottom p-3">
                            <img class="img-fluid" style="width: 40%;" src="{{ asset('assets/img/rooms/room1.jpg') }}"
                                alt="">
                            <div style="width: 55%;">
                                <h5>Standard Room</h5>
                                <p>Rooms : 2</p>
                                <p id="harga">Rp 500.000</p>
                            </div>
                        </div>
                    </div>
                    <div id="cartTotalContainer"
                        class="d-flex justify-content-between border-top mt-2 p-3 align-items-center">
                        <h5 id="cartTotal"></h5>
                        @if (Auth::check())
                            <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold text-wrap"
                                href="{{ url('rooms/reservasi/action') }}">Pesan</a>
                        @else
                            <a class="col-sm-4 btn btn-warning nav-link text-black fw-bold" href="/login">Pesan</a>
                        @endif
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    @foreach ($item_kamar as $item)
        <div id="modal{{$item->id_kamar}}" class="pt-5"
            style="display: {{ $_GET['id_kamar'] ?? null !== null ? 'flex' : 'none' }}; position: fixed; height: 100vw; width:100vw !important; top:0; left:0; background-color: #00000077; z-index: 1000000;">
            <div class="d-flex flex-column w-50 bg-white mt-3"
                style="margin-left: 25%; border-radius: 10px 10px 10px 10px; overflow:hidden; height:fit-content;">
                <header class="d-flex flex-row-reverse justify-content-between bg-secondary align-items-center">
                    <button onclick="document.getElementById('modal').style.display='none'"
                        class="d-flex justify-content-center align-items-center bg-primary h-100 border-0 "
                        style="width: 85px; cursor: pointer;"><a class="w-100 fs-3 text-white text-decoration-none"
                            href="/admin-dashboard/rooms-edit">&times;</a></button>
                    <h6 class="text-white p-3 pt-4">Edit Kamar - {{ $item->nama}}</h6>
                </header>
                <form action="{{ url('/admin-dashboard/rooms-edit/actionEdit/' . $item->id_kamar)}}" method="POST">
                    @csrf
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                        <h6 class="w-25">Nama Kamar</h6>
                        <div class="input-group w-75">
                            <input type="text" name="namaKamar" class="form-control" placeholder="Nama kamar*"
                                value="{{ $item->nama}}" required>
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex w-100 p-3 pe-5">
                        <h6 class="w-25">Deskripsi</h6>
                        <div class="input-group w-75">
                            <textarea name="deskripsiKamar" id="" class="form-control" placeholder="Deskripsi Kamar*">{{ $item->desc }}</textarea>
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                        <h6 class="w-25">Status</h6>
                        <div class="input-group w-75">
                            <select name="statusKamar" id="" class="form-select">
                                <option value="">Select Status*</option>
                                <option value="Tersedia" {{ $item->status == 'Tersedia' ? 'selected' : ''}}>Tersedia</option>
                                <option value="Tidak Tersedia" {{ $item->status == 'Tidak Tersedia' ? 'selected' : ''}}>Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                        <div class="input-group w-75">
                            <button
                                class="badge text-dark font-weight-bold fs-6 bg-warning p-3 w-25 px-5 mt-2 d-flex justify-content-center align-items-center border-0"
                                style="cursor: pointer;" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <div id="modal" class="pt-5"
        style="display: none; position: fixed; height: 100vw; width:100vw !important; top:0; left:0; background-color: #00000077; z-index: 1000000;">
        <div class="d-flex flex-column w-50 bg-white mt-3"
            style="margin-left: 25%; border-radius: 10px 10px 10px 10px; overflow:hidden; height:fit-content;">
            <header class="d-flex flex-row-reverse justify-content-between bg-secondary align-items-center">
                <button onclick="document.getElementById('modal').style.display='none'"
                    class="d-flex justify-content-center align-items-center bg-primary h-100 border-0 "
                    style="width: 85px; cursor: pointer;"><a class="w-100 fs-3 text-white text-decoration-none"
                        href="/admin-dashboard/rooms-edit">&times;</a></button>
                <h6 class="text-white p-3 pt-4">Tambah Kamar</h6>
            </header>
            <form action="{{ url('/admin-dashboard/rooms-edit/action')}}" method="POST">
                @csrf
                <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                    <h6 class="w-25">Tipe Kamar</h6>
                    <div class="input-group w-75">
                        <select name="tipeKamar" id="" class="form-select">
                            <option value="">Select Status*</option>
                            @foreach ($tipe_kamar as $item)
                                <option value="{{ $item->id_tipe }}">{{ $item->nama }}</option>                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                    <h6 class="w-25">Nama Kamar</h6>
                    <div class="input-group w-75">
                        <input type="text" name="namaKamar" class="form-control" placeholder="Nama kamar*"
                            value="" required>
                    </div>
                </div>
                <div class="ms-md-auto pe-md-3 d-flex w-100 p-3 pe-5">
                    <h6 class="w-25">Deskripsi</h6>
                    <div class="input-group w-75">
                        <textarea name="deskripsiKamar" id="" class="form-control" placeholder="Deskripsi Kamar*" required></textarea>
                    </div>
                </div>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                    <h6 class="w-25">Status</h6>
                    <div class="input-group w-75">
                        <select name="statusKamar" id="" class="form-select">
                            <option value="">Select Status*</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center w-100 p-3 pe-5">
                    <div class="input-group w-75">
                        <button
                            class="badge text-black font-weight-bold fs-6 bg-warning p-3 w-25 px-5 mt-2 d-flex justify-content-center align-items-center border-0"
                            style="cursor: pointer;" type="submit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core theme JS-->
    {{-- <script src="{{ asset('/js/tamu/scripts.js')}}"></script> --}}
    <script src="{{ asset('/js/admin/rooms.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
