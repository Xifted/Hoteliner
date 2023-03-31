<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/#page-top">
            <img src="{{ asset('assets/img/logos/Hoteliner-logos_transparent.png')}}" alt="..." />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
            <i class="fa-solid fa-bed"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="/#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/#rooms">Rooms</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/rooms">Rooms List</a></li>
                @if (Auth::check())
                    <li class="nav-item d-flex flex-column align-items-center">
                        <a id="profileBtn" onclick="dropDown()" class="nav-link text-light fw-bold" style="cursor: pointer">
                            Hi! {{ Auth::user()->nama == null ? Auth::user()->username : Auth::user()->nama }} <i class="bi bi-caret-down-fill text-white"></i>
                        </a>
                        <div id="dropDownItems" class="nav-item bg-white p-1 rounded shadow-lg" style="display: none;">
                            <a href="{{ url('/profile/' . Auth::user()->id_tamu)}}" class="nav-link text-primary px-3 fw-bold border-bottom">Profile</a>
                            <a onclick="clearLocalStorage()" href="/logout" class="nav-link text-primary px-3 fw-bold">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="btn btn-warning nav-link text-black fw-bold" href="/login">Sign
                            Up</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
