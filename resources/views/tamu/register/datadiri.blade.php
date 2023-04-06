<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Data Diri</title>
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

<body class="d-flex flex-column min-vh-100">

    @include('tamu.layouts.navbar2')

    <section class="" id="contact">
        <div class="container col-md-5 bg-light py-5 rounded">
            <div class="text-center mb-5">
                <h2 class="section-heading text-dark text-uppercase">Data Diri</h2>
            </div>
            <form id="contactForm" action="{{ route('actiondatadiri') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-3 d-flex justify-content-center">
                    <div class="col-md-10 d-flex flex-column justify-content-between">
                        <div class="form-group d-flex justify-content-between">
                            <!-- Email input-->
                            <input class="form-control text-dark" style="width: 45%;" name="nama" type="text"
                                placeholder="Your Name *" required />
                            <input class="form-control text-dark" style="width: 45%;"name="no_telp" type="tel"
                                placeholder="Your Phone Number *" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <!-- Username input-->
                            <input class="form-control text-dark" style="width: 65%;" name="tgl_lahir" type="date"
                                placeholder="Your Birthday *" required />

                            <div class="d-flex flex-column" style="width: 30%;">
                                <div class="d-flex form-check">
                                    <input class="form-check-input" style="padding: 0.8rem;" type="radio"
                                        name="gender" id="" value="Laki - Laki" />
                                    <label class="form-check-label ms-2" for="html">Laki - Laki</label><br>
                                </div>
                                <div class="d-flex form-check">
                                    <input class="form-check-input" style="padding: 0.8rem;" type="radio"
                                        name="gender" id="" value="Perempuan" />
                                    <label class="form-check-label ms-2" for="html">Perempuan</label><br>
                                </div>
                            </div>
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>
                        <div class="form-group d-flex">
                            <!-- Username input-->
                            <textarea class="form-control text-dark" name="alamat" placeholder="Your Address" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>

                        {{-- <div class="form-group mb-md-0"> --}}
                        <!-- Password input-->
                        {{-- <input class="form-control text-dark" type="password" placeholder="Repeat Your Password *" required /> --}}
                        {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A Password is required.</div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <!-- Submit Button-->
                <div class="text-center "><button class="btn btn-primary btn-lg text-uppercase text-dark"
                        style="width: 83%;" id="submitButton" type="submit">Submit</button></div>
            </form>
            {{-- <p class="text-center mt-3">Sudah Punya Akun? <a class="text-decoration-none" href="/login">Login</a></p> --}}
        </div>
    </section>

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
