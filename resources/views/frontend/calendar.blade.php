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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/admission.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fancybox.css')}}" />
    <title>Praramva World School</title>
    @php
        $logo = DB::table('logos')->select('*')->first();
    @endphp
    @if($logo)
        <link rel="icon" href="{{asset('uploads/logo/'.$logo->image)}}">
    @endif
    <style>
        body {
            margin-top: 50px;
            justify-content: center;
            background-color: #cfe3d1;
        }
        button {
            width: 75px;
            cursor: pointer;
            box-shadow: 0px 0px 2px gray;
            border: none;
            outline: none;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        #header {
            padding: 10px;
            color: #d36c6c;
            font-size: 26px;
            font-family: sans-serif;
            display: flex;
            justify-content: space-between;
        }
        #monthDisplay{
            color: #000000;
        }
        #header button {
            background-color:#1f2944;
        }
        #container {
            width: 770px;
        }
        #weekdays {
            width: 100%;
            display: flex;
            justify-content: space-between;
            color: #ffffff;
            background-color: #167e56;

        }
        #weekdays div {
            width: 100px;
            padding: 10px;
        }
        #calendar {
            width: 100%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            /*background-color: #222227;*/
        }
        .day {
            width: 100px;
            padding: 10px;
            height: 100px;
            cursor: pointer;
            box-sizing: border-box;
            background-color: white;
            margin: 5px;
            box-shadow: 0px 0px 3px #CBD4C2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .day:hover {
            background-color: #262626;
            color: #ffffff;
        }

        .day + #currentDay {
            background-color: #1f2944;
            color: #ffffff;
        }

        .event {
            font-size: 12px;
            padding: 3px;
            background-color: #262626;
            color: white;
            border-radius: 5px;
            max-height: 55px;
            overflow: hidden;
        }
        .padding {
            cursor: default !important;
            background-color: #FFFCFF !important;
            box-shadow: none !important;
        }
        #newEventModal, #deleteEventModal {
            display: none;
            z-index: 20;
            padding: 25px;
            background-color: #e8f4fa;
            box-shadow: 0px 0px 3px black;
            border-radius: 5px;
            width: 350px;
            top: 100px;
            left: calc(50% - 175px);
            position: absolute;
            font-family: sans-serif;
        }
        #eventTitleInput {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 25px;
            border-radius: 3px;
            outline: none;
            border: none;
            box-shadow: 0px 0px 3px gray;
        }
        #eventTitleInput.error {
            border: 2px solid red;
        }
        #cancelButton, #deleteButton {
            background-color: #d36c6c;
        }
        #saveButton, #closeButton {
            background-color: #92a1d1;
        }
        #eventText {
            font-size: 14px;
        }
        #modalBackDrop {
            display: none;
            top: 0px;
            left: 0px;
            z-index: 10;
            width: 100vw;
            height: 100vh;
            position: absolute;
            background-color: rgba(0,0,0,0.8);
        }
        .calendar-body{
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }
    </style>
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
                                <a class="dropdown-item" href="">Kindergarten</a>
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
                            <a href="{{url('admin/login')}}" class="nav-login">LOGIN</a>
                        </div>
                        <div class="calendar-button">
                            <a href=""><i class="fas fa-calendar-alt"></i></a>
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
    <br>
    <br>
    <div class="main-body calendar-body">
        <section id="container">
            <div id="header">
                <div id="monthDisplay"></div>
                <div>
                    <button id="backButton"><</button>
                    <button id="nextButton">></button>
                </div>
            </div>

            <div id="weekdays">
                <div>Sunday</div>
                <div>Monday</div>
                <div>Tuesday</div>
                <div>Wednesday</div>
                <div>Thursday</div>
                <div>Friday</div>
                <div>Saturday</div>
            </div>

            <div id="calendar"></div>
        </section>
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
                                <li><a href="">Calender</a></li>
                                <li><a href="">Events</a></li>
                                <li><a href="">News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-3rd">
                        <div class="footer-title">Our School</div>
                        <div class="footer-bar"></div>
                        <div class="footer-desc">
                            <ul style="padding: 0; list-style: none; margin-bottom: 0">
                                <li><a href="">Kindergarten</a></li>
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
                                <input type="text" name="title" required placeholder="Your Name" />
                                <input type="email" name="email" required placeholder="Email Address" />
                                <input type="text" name="subject" required placeholder="Subject" />
                                <textarea type="text" name="description" rows="3" required placeholder="Message"></textarea>
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
                        Copyright © <span id="dateHolder"></span> Prarambha School.
                        Developed by
                        <a href="https://www.itarrow.com">IT Arrow Pvt Ltd.</a>
                    </div>
                    <div class="footer-linksection">
                        <a class="footer-link" href="{{url('/')}}">Home</a>
                        <a class="footer-link" href="{{url('about-us')}}">About</a>
                        <a class="footer-link" href="">Help</a>
                        <a class="footer-link" href="">Personal Data Protection</a>
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
<script>
    let nav = 0;
    let clicked = null;
    let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

    const calendar = document.getElementById('calendar');
    // const newEventModal = document.getElementById('newEventModal');
    // const deleteEventModal = document.getElementById('deleteEventModal');
    // const backDrop = document.getElementById('modalBackDrop');
    // const eventTitleInput = document.getElementById('eventTitleInput');
    const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    function openModal(date) {
        clicked = date;

        const eventForDay = events.find(e => e.date === clicked);

        if (eventForDay) {
            document.getElementById('eventText').innerText = eventForDay.title;
            deleteEventModal.style.display = 'block';
        } else {
            newEventModal.style.display = 'block';
        }

        backDrop.style.display = 'block';
    }

    function load() {
        const dt = new Date();

        if (nav !== 0) {
            dt.setMonth(new Date().getMonth() + nav);
        }

        const day = dt.getDate();
        const month = dt.getMonth();
        const year = dt.getFullYear();

        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
            weekday: 'long',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
        });
        const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

        document.getElementById('monthDisplay').innerText =
            `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

        calendar.innerHTML = '';

        for(let i = 1; i <= paddingDays + daysInMonth; i++) {
            const daySquare = document.createElement('div');
            daySquare.classList.add('day');

            const dayString = `${month + 1}/${i - paddingDays}/${year}`;

            if (i > paddingDays) {
                daySquare.innerText = i - paddingDays;
                const eventForDay = events.find(e => e.date === dayString);

                if (i - paddingDays === day && nav === 0) {
                    daySquare.id = 'currentDay';
                }

                if (eventForDay) {
                    const eventDiv = document.createElement('div');
                    eventDiv.classList.add('event');
                    eventDiv.innerText = eventForDay.title;
                    daySquare.appendChild(eventDiv);
                }

                daySquare.addEventListener('click', () => openModal(dayString));
            } else {
                daySquare.classList.add('padding');
            }

            calendar.appendChild(daySquare);
        }
    }

    function closeModal() {
        eventTitleInput.classList.remove('error');
        newEventModal.style.display = 'none';
        deleteEventModal.style.display = 'none';
        backDrop.style.display = 'none';
        eventTitleInput.value = '';
        clicked = null;
        load();
    }

    function saveEvent() {
        if (eventTitleInput.value) {
            eventTitleInput.classList.remove('error');

            events.push({
                date: clicked,
                title: eventTitleInput.value,
            });

            localStorage.setItem('events', JSON.stringify(events));
            closeModal();
        } else {
            eventTitleInput.classList.add('error');
        }
    }

    function deleteEvent() {
        events = events.filter(e => e.date !== clicked);
        localStorage.setItem('events', JSON.stringify(events));
        closeModal();
    }

    function initButtons() {
        document.getElementById('nextButton').addEventListener('click', () => {
            nav++;
            load();
        });

        document.getElementById('backButton').addEventListener('click', () => {
            nav--;
            load();
        });
    }

    initButtons();
    load();

</script>
</body>

</html>
