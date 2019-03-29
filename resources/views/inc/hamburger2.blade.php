<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{asset('/all')}}">
                    <img src="{{asset('/')}}images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('company_job_offers',['id'=>\Illuminate\Support\Facades\Session::get('user')['company_id']])}}">
                        <i class="fas fa-tachometer-alt"></i>Job Offers</a>
                </li>
                <li>
                    <a href="{{route('myOffers',['id'=>\Illuminate\Support\Facades\Session::get('user')['id']])}}">
                        <i class="fas fa-clipboard-list"></i>My job offers
                    </a>
                </li>
                <li>
                    <a href="{{route('createForm')}}">
                        <i class="far fa-plus-square"></i>Create job offer
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>