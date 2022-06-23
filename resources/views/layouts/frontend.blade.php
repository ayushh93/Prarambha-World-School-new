<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/font-awesome/css/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/material-design/css/material-design-iconic-font.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/hs-menu.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fancybox.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/admission.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}" />
    <title>Praramva World School</title>
    @php
        $logo = DB::table('logos')->select('*')->first();
    @endphp
    @if($logo)
    <link rel="icon" href="{{asset('uploads/logo/'.$logo->image)}}">
    @endif
</head>

<body>
<div id="app">
    <header>
        <div id="mainMenu">
            @php
                $logo = DB::table('logos')->select('*')->first();
            @endphp
            <nav class="navbar navbar-expand-lg">
                @if($logo)
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('uploads/logo/'.$logo->image)}}" />
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="{{url('/')}}"> Home </a>
                            <span class="nav-underline"></span>
                        </li>
                        <li class="nav-item dropdown service-nav">
                            <a class="nav-link dropdown dropdown-toggle" data-toggle="dropdown" href="#">
                                About
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('about-us')}}">About PWS</a>
                                <a class="dropdown-item" href="{{url('policy')}}">Policies</a>
                                <a class="dropdown-item" href="{{url('management')}}">Management</a>
                                <a class="dropdown-item" href="{{url('faculty')}}">Faculty</a>
                                <a class="dropdown-item" href="{{url('facilities')}}">Facilities</a>
                            </div>
                            <span class="nav-underline"></span>
                        </li>
                        <li class="nav-item dropdown service-nav">
                            <a class="nav-link dropdown dropdown-toggle" data-toggle="dropdown" href="#">
                                Courses
                            </a>
                            <div class="dropdown-menu">
                                @php
                                    $courses = DB::table('courses')->select('*')->get();
                                @endphp
                                @if($courses)
                                    @foreach($courses as $course)
                                        <a class="dropdown-item" href="{{url('course/'.$course->slug)}}">{{$course->title}}</a>
                                    @endforeach
                                @endif
                            </div>
                            <span class="nav-underline"></span>
                        </li>
                        <li class="nav-item dropdown service-nav">
                            <a class="nav-link dropdown dropdown-toggle" data-toggle="dropdown" href="#">
                                School
                            </a>
                            <div class="dropdown-menu">
                                @php
                                    $schools = DB::table('schools')->select('*')->get();
                                @endphp
                                <a class="dropdown-item" href="{{url('kindergarten')}}">Kindergarten</a>
                                @if($schools)
                                    @foreach($schools as $school)
                                        <a class="dropdown-item" href="{{url('/'.$school->slug)}}">{{$school->title}}</a>
                                    @endforeach
                                @endif

                                <a class="dropdown-item" href="{{url('gallery')}}">Gallery</a>
                            </div>
                            <span class="nav-underline"></span>
                        </li>
                        <li class="nav-item dropdown service-nav">
                            <a class="nav-link dropdown dropdown-toggle" data-toggle="dropdown" href="#">
                                Admissions
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('overviews')}}">Overview</a>
                                <a class="dropdown-item" href="{{url('school-fees')}}">School Fees</a>
                                <a class="dropdown-item" href="{{url('regulations')}}">Regulations</a>
                                <a class="dropdown-item" href="{{url('admissions')}}">Register Online</a>
                                <a class="dropdown-item" href="{{url('contact-us')}}">Contact Registration</a>
                            </div>
                            <span class="nav-underline"></span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="{{url('contact-us')}}"> Contact Us </a>

                            <span class="nav-underline"></span>
                        </li>
                    </ul>
                    <div class="nav-buttons">
                        @php
                            $links = DB::table('links')->select('*')->where('status',1)->get();
                        @endphp
                        @if($links)
                            <div id="rightNavItems" class="float-right d-flex flex-row">
                                @foreach($links as $key=>$link)
                                    @if($key % 2 == 0)
                                        <a title="{{$link->title}}" data-toggle="tooltip" data-placement="bottom" id="itemFb"
                                           class="btn btn-sm border-primary rounded-full">
                                            <i class="fab fa-{{$link->icon}}"></i>
                                        </a>
                                    @else
                                        <a title="{{$link->title}}" data-toggle="tooltip" data-placement="bottom" id="itemInsta"
                                           class="btn btn-sm mx-2 rounded-full">
                                            <i class="fab fa-{{$link->icon}}"></i>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        <div class="login-button">
                            <a href="http://praramvaworldschool.edu.np/admin/login" class="nav-login">LOGIN</a>
                        </div>
                        <div class="calendar-button">
                            <a href="{{url('calendar')}}"><i class="fas fa-calendar-alt"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div id="stickyContactInfo">
            <div class="tab mx-1">
                <span><i class="fa fa-check-circle"></i></span>
                <span><a href="{{url('admissions')}}">Apply Now</a></span>
            </div>
            <div class="tab">
                @php
                    $cont = DB::table('contacts')->select('*')->first();
                @endphp
                @if($cont)
                <span><i class="fa fa-phone"></i></span>
                <span><a href="tel:+">01-{{$cont->phone}}</a></span>
                @endif
            </div>
        </div>
    </header>

    <div class="main-body">
       @yield('main-content')
    </div>

    <footer>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 footer-1st">
                        <div class="footer-name">
                            @if($logo)
                                <a class="footer-logo" href="{{url('/')}}">
                                    <img src="{{asset('uploads/logo/'.$logo->image)}}" />
                                </a>
                            @endif
                        </div>
                        @php
                            $contacts = DB::table('contacts')->select('*')->first();
                        @endphp
                        @if($contacts)
                        <div class="footer-list">
                            <i class="fa fa-map-marker-alt"></i>
                            {!! $contacts->address !!}
                        </div>
                        <div class="footer-list">
                            <i class="fa fa-phone"></i>
                            +977-01-{!! $contacts->phone !!}
                        </div>
                        <div class="footer-list">
                            <i class="fa fa-envelope"></i>
                            {!! $contacts->email !!}
                        </div>
                        @endif

                        @php
                            $linkss = DB::table('links')->select('*')->where('status',1)->get();
                        @endphp
                        @if($linkss)
                        <div class="footer-social">
                            @foreach($linkss as $lnk)
                            <a href="javascript:" target="_blank">
                                <i class="fab fa-{{$lnk->icon}}"></i>
                            </a>

                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="col-md-3 footer-2nd">
                        <div class="footer-title">Quick Links</div>
                        <div class="footer-bar"></div>
                        <div class="footer-desc">
                            <ul style="padding: 0; list-style: none; margin-bottom: 0">
                                <li><a href="{{url('about-us')}}">About PWS</a></li>
                                <li><a href="{{url('calendar')}}">Calender</a></li>
                                <li><a href="{{url('all-events')}}">Events</a></li>
                                <li><a href="">News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-3rd">
                        <div class="footer-title">Our School</div>
                        <div class="footer-bar"></div>
                        <div class="footer-desc">
                            <ul style="padding: 0; list-style: none; margin-bottom: 0">
                                <li><a href="{{url('kindergarten')}}">Kindergarten</a></li>
                                <li><a href="{{url('elementary')}}">Elementary</a></li>
                                <li><a href="{{url('secondary')}}">Secondary</a></li>
                                <li><a href="{{url('higher-secondary')}}">Higher Secondary</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-4th">
                        <div class="footer-title">Contact Us</div>
                        <div class="footer-bar"></div>
                        <div class="footer-form">
                            <form id="footerContactForm" action="{{url('send')}}" method="post">
                                @csrf
                                <input type="text" name="title" required placeholder="Your Name" required />
                                <input type="email" name="email" required placeholder="Email Address"  required/>
                                <input type="text" name="subject" required placeholder="Subject" required />
                                <textarea type="text" name="description" rows="3" required placeholder="Message" required></textarea>
                                <button class="footer-btn" type="submit">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-block">
                    <div class="copyright-text">
                        Copyright © <span id="dateHolder"></span> Praramva World School.
                        Developed by
                        <a href="https://www.itarrow.com">IT Arrow Pvt Ltd.</a>
                    </div>
                    <div class="footer-linksection">
                        <a class="footer-link" href="{{url('/')}}">Home</a>
                        <a class="footer-link" href="{{url('about-us')}}">About</a>
                        <a class="footer-link" href="{{ url('faqs')}}">Help</a>
                        <a id="back-to-top" href="#" class="back-to-top"><i class="fa fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="floating-social">
        <a class="floating-link" href="viber://chat?number=977981234567" data-toggle="tooltip" data-placement="top"
           title="9812345677">
            <i class="fab fa-viber"></i>
        </a>
        <a class="floating-link" href="https://api.whatsapp.com/send?phone=977981234567" target="_blank"
           data-toggle="tooltip" data-placement="top" title="98123456655">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.hsmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>
<script>
    document.getElementById("dateHolder").innerHTML =
        new Date().getFullYear();
</script>
</body>

</html>
