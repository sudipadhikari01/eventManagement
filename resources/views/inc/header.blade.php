<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li> 
                        <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li> 
                        <li class="nav-item"><a class="nav-link" href="speakers.html">Speakers</a>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="schedule.html">Schedule</a>
                                <li class="nav-item"><a class="nav-link" href="venue.html">Venue</a>
                                <li class="nav-item"><a class="nav-link" href="price.html">Pricing</a> 
                                <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                            </ul>
                        </li> 
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                            </ul>
                        </li> 
                    <li class="nav-item"><a class="nav-link" href="{{url('/registerEvent')}}">GET EVENT MGMT</a></li>
                    </ul>
                    <div style="margin-left: 627px;;color:white;" >
                            <ul class="nav navbar-nav navbar-right">
                                    <li class="nav-item"><a href="{{url('/login')}}" style="color:white">Log In</a></li>
                                    <li class="nav-item"><a href="{{url('/register')}}" style="color:white">Register</a></li>
                                    {{-- <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li> --}}
                             </ul>
                    </div>
                   
                </div> 
            </div>
        </nav>
    </div>
</header>