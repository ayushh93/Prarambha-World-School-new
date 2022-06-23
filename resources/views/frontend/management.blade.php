@extends('layouts.frontend')

@section('main-content')
    <section id="homeEvents">
        <div class="container">
            <h2 class="section-title label">Management</h2>
            <div class="title-bar mx-auto"></div>
            <div class="owl-carousel owl-theme" id="eventSlider">
                @foreach($management as $mang)
                <div class="item wow fadeInUp delay-0.5s ease animated">
                    <div class="image-wrap">
                        <a href="">
                            <img src="{{asset('uploads/management/'.$mang->image)}}" />
                            <div class="event-overlay"></div>
                        </a>
                    </div>
                    <div class="event-bar">
                        <div class="event-block-date">
                            <div class="day">{{$mang->position}}</div>

                        </div>
                        <div class="event-block-text">
                            <div class="event-block-title">
                                {{$mang->title}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- for space in managment  left-->

            <div class="home-events-links">


                </a>
            </div>
        </div>
    </section>
@endsection
