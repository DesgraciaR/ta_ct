<header class="main-header">
    <!-- Logo -->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <div class="image">
                <img src="{{ url('img/bknn.png') }}">
            </div>
        </a>
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

               <li>
                  <a href="{{ route('logout')}}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="fa fa-sign-out ">Sign out</a>
                  <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">{{csrf_field()}}</form>
                </li>
                
            </ul>
        </div>
    </nav>

</header>