    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg text-uppercase fixed-top" style="background-color: rgb(44, 62, 80); " id="mainNav">
            <div class="container">
                <a class="navbar-brand text-white" href="#page-top">IAGROW</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="/">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="/artikel">Artikel</a></li>
                        @if (Auth::check() && Auth::user()->is_admin == 1)
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="/admin">Admin</a></li>
                        @endif
                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item mx-0 mx-lg-1">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="nav-link py-3 px-0 px-lg-3 rounded text-white">Logout</button>
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="/register">Register</a></li>
                                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="/login">Login</a></li>
                                @endauth
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </body>