@extends('layouts.frontend')

@section('main-content')
    @if($sliders)
    <section id="homeSliderSection">
        <div class="owl-carousel owl-theme" id="homeSlider">
            @foreach($sliders as $slider)
            <div class="item">
                <div class="slider-block" style="background-image: url('{{asset('uploads/slider/'.$slider->image)}}')">
                    <div class="slider-overlay"></div>
                    <div class="slider-txt">
                        <div class="slider-caption">
                            {{$slider->title}}
                        </div>
                        <div class="slider-desc">
                            
                        </div>
                        <a href="{{$slider->link}}" class="slider-btn" target="_blank">Learn more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    @if($about)
    <section id="homeAbout">
        <div class="container">
            <div class="header-about">
                <h1 class="large label">About Us</h1>
                <div class="title-bar"></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about-image-index">
                        <img src="{{asset('uploads/about/'.$about->image)}}" class="rounded">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-text-index">
                        <p>
                            {!! Str::limit($about->description,300) !!}
                        </p>
                        <a href="{{url('about-us')}}" class="link-btn large-btn">Learn more about us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="why-us">
        <div class="container">
          <h3 class="why-us-sub">Why <span class="why-us-sub-inner">Praramva World School</span>?</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur commodi, quam non tempora eaque
            praesentium .</p>
          <div class="why-us-options">
              @if($whys)
            <div class="row">
                @foreach($whys as $why)
              <div class="col-lg-3 col-md-3 text-center">
                <div class="option">
                  <img src="{{ asset('uploads/why/'.$why->image)}}" alt="Image" class="img-fluid">
                </div>
                <div class="option-text">
                  <p>{{$why->title}}</p>
                </div>
              </div>
              @endforeach
            </div>
            @endif
          </div>
        </div>
      </section>


    <section id="homeEvents">
        <div class="container">
            <h2 class="section-title label">News and Events</h2>
            <div class="title-bar mx-auto"></div>
            @if($events)
            <div class="owl-carousel owl-theme" id="eventSlider">
                @foreach($events as $event)
                <div class="item wow fadeInUp delay-0.5s ease animated">
                    <div class="image-wrap">
                        <a href="javascript:">
                            <img src="{{asset('uploads/event/'.$event->image)}}" />
                            <div class="event-overlay"></div>
                        </a>
                    </div>
                    <div class="event-bar">
                        <div class="event-block-date">
                            <div class="day">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                            <div class="month">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                            <div class="year">{{ \Carbon\Carbon::parse($event->event_date)->format('Y') }}</div>
                        </div>
                        <div class="event-block-text">
                            <div class="event-block-title">
                                {!! $event->title !!}
                            </div>
                            <div class="event-block-school">Higher Secondary</div>
                            <a class="event-block-btn" href="javascript:">More Info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <div class="home-events-links">
                <a class="link-btn" href="{{url('all-events')}}">View all events</a>
                <a class="link-btn" href="{{url('calendar')}}">Calender</a>
                <a class="link-btn" href="{{asset('uploads/admission/'.$admission->pdf)}}" download>
                    <i class="fa fa-download"></i>
                    Academic Calender 2022-2023
                </a>
            </div>
        </div>
    </section>
    
    @if($gallery)
     <section id="homeGallery" class="container-fluid mx-auto">
        <div class="container">
          <h1 class="section-title label pb-12">Gallery</h1>
          <div class="title-bar w-full mx-auto"></div>
          <div class="gallery-flex">
            <div class="row">
                 @foreach($gallery as $gall)
                 <div class="col-lg-3 col-md-4">
                    <div class="gallery-image">
                      <a href="{{asset('uploads/gallery/'.$gall->image)}}" data-fancybox="gallery">
                        <img src="{{asset('uploads/gallery/'.$gall->image)}}" alt="Image">
                      </a>
                    </div>
                  </div>

              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif

    <section id="homeAdmission" style="background-image: url('{{asset('assets/frontend/img/s3.jpg')}}')">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="home-admission-title wow fadeInUp delay-0.5s ease animated">
                        <h1 class="large label">Admissions</h1>
                        <div class="title-bar-white"></div>
                        <div class="home-abt-sub-title">
                            No entrance exams. No waiting list. All year enrollment.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="home-admission-text wow fadeInUp delay-0.5s ease animated">
                        <p>
                            The Prarambha School has been providing a modern education
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt
                        </p>

                        <p>
                            <i class="fa fa-mobile-alt bg-success"></i> +977 {{$contact->phone}}
                        </p>
                        <p>
                            <i class="fa fa-envelope bg-success"></i> {{$contact->email}}
                        </p>

                        <a href="{{url('admissions')}}" class="home-admission-btn1">Admissions</a>
                        <a href="{{url('admissions')}}" class="home-admission-btn2">Register Online</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($partners)
    <section id="accreditation">
        <div class="container">
            <h2 class="section-title label">Accreditation</h2>
            <div class="title-bar mx-auto"></div>
            <div class="accreditation-grid">
                @foreach($partners as $partner)
                <div class="accreditation-block wow fadeIn delay-0.5s ease animated">
                    <a href="javascript:" target="_blank" rel="nofollow">
                        <img src="{{asset('uploads/partner/'.$partner->image)}}" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
