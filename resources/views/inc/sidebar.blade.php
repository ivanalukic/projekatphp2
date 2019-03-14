<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('all_job_offers')}}">
            <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

                    <li class=" has-sub">
                        <a href="">
                            <i class="fas fa-home"></i>Admin
                        </a>
                    </li>
                    <li class="">
                        {{--ovde je id mail kompanije--}}
                        <a href="{{route('company_job_offers',['id'=>1])}}">
                            <i class="fas fa-thumbtack"></i>Job offers
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fas fa-tasks"></i>Tasks
                        </a>
                    </li>
            @yield('menu')
                {{-- <li class="has-sub">
                       <a class="js-arrow" href="#">
                           <i class="fas fa-copy"></i>Pages</a>
                       <ul class="list-unstyled navbar__sub-list js-sub-list">
                           <li>
                               <a href="login.html">Login</a>
                           </li>
                           <li>
                               <a href="register.html">Register</a>
                           </li>
                           <li>
                               <a href="forget-pass.html">Forget Password</a>
                           </li>
                       </ul>
                   </li> --}}
            </ul>
        </nav>
    </div>
</aside>