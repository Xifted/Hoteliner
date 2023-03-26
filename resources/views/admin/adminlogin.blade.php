<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Admin Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">

    @include('tamu.layouts.navbar2')

    <section class="" style="margin-top: 70px;" id="contact">
        <div class="container col-md-3 bg-light py-5 rounded">
            <div class="text-center mb-5">
                <h2 class="section-heading text-uppercase text-dark">Login</h2>
            </div>
            <form id="contactForm" action="{{ route('actionLoginAdmin') }}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5 d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="form-group">
                            <!-- Username input-->
                            <input class="form-control text-dark" id="name" name="username" type="text" placeholder="Your Username *" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Password input-->
                            <input class="form-control text-dark" type="password" placeholder="Your Password *" name="password" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A Password is required.</div> --}}
                        </div>
                    </div>
                </div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary text-dark btn-lg text-uppercase"
                        style="width: 83%;" id="submitButton" type="submit">Login</button></div>
            </form>
            <p class="text-center mt-3">Belum Punya Akun? <a class="text-decoration-none" href="/register">Register</a>
                Sekarang </p>
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
