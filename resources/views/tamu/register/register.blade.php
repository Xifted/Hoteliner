<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hoteliner - Register</title>
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
        <div class="container col-md-4 bg-light py-5 rounded">
            <div class="text-center mb-5">
                <h2 class="section-heading text-dark text-uppercase">Register</h2>
            </div>
            <form id="contactForm" action="{{route('actionregister')}}" method="POST">
                @csrf
                <div class="row align-items-stretch mb-3 d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="form-group">
                            <!-- Email input-->
                            <input class="form-control text-dark" id="email" name="email" type="email" placeholder="Your Email *" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>
                        <div class="form-group">
                            <!-- Username input-->
                            <input class="form-control text-dark" id="name" name="username" type="text" placeholder="Your Username *" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="name:required">A Username is required.</div> --}}
                        </div>
                        <div class="form-group">
                            <!-- Password input-->
                            <input class="form-control text-dark" id="password" type="password" name="password" placeholder="Your Password *" required />
                            {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A Password is required.</div> --}}
                        </div>
                        {{-- <div class="form-group mb-md-0"> --}}
                            <!-- Password input-->
                            {{-- <input class="form-control text-dark" type="password" placeholder="Repeat Your Password *" required /> --}}
                            {{-- <div class="invalid-feedback" data-sb-feedback="phone:required">A Password is required.</div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <!-- Submit Button-->
                <div class="text-center "><button class="btn btn-primary btn-lg text-uppercase text-dark" style="width: 83%;" id="submitButton" type="submit">Register</button></div>
            </form>
            <p class="text-center mt-3">Sudah Punya Akun? <a class="text-decoration-none" href="/login">Login</a></p>
        </div>
    </section>

    @include('tamu.layouts.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/tamu/scripts.js')}}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
</body>

</html>
