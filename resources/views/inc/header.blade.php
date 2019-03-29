<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="{{asset('/')}}">
                    <img src="{{asset('/')}}images/icon/logo-white.png" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header-wrap">
           @yield('select')
            </div>
            <div class="header__tool">

                <div class="account-wrap">
                    <div class="">
                        <a href="{{ url('log') }}" class="au-btn au-btn-icon au-btn--blue">
                            <i class="far fa-user"></i></i>Log in</a>
                    </div>
                </div>
    </div>
     </div>
    </div>
 </header>