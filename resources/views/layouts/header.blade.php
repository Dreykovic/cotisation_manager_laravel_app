<div class="header header-one">

    <div class="header-left header-left-one">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>

    </div>


    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>




    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">





        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ asset('assets/img/user.png') }}" alt="">
                    <span class="status online"></span>
                </span>
                <span>Tresor{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i data-feather="user" class="me-1"></i>
                    Profil</a>
                <a class="dropdown-item" href="#"><i data-feather="settings" class="me-1"></i>
                    Parametres</a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="log-out" class="me-1"></i>
                    Déconnexion</a>
            </div>
        </li>

    </ul>

</div>
