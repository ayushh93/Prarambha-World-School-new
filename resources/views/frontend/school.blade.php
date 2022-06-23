@extends('layouts.frontend')

@section('main-content')
    <section id="homeEvents">
        <div class="container">
            <h2 class="section-title label">{{$school->title}}</h2>
            <div class="title-bar mx-auto"></div>
            <div class="owl-carousel owl-theme" id="eventSlider">
                @foreach($levels as $level)
                <div class="item wow fadeInUp delay-0.5s ease animated">
                    <div class="image-wrap">
                        <a href="{{url('event/'.$level->slug)}}">
                            <img src="{{asset('uploads/level/'.$level->image)}}" />
                            <div class="event-overlay"></div>
                        </a>
                    </div>
                    <div class="event-bar">
                        <div class="event-block-date">
                            <div class="day">{{ \Carbon\Carbon::parse($level->level_date)->format('d') }}</div>
                            <div class="month">{{ \Carbon\Carbon::parse($level->level_date)->format('M') }}</div>
                            <div class="year">{{ \Carbon\Carbon::parse($level->level_date)->format('Y') }}</div>
                        </div>
                        <div class="event-block-text">
                            <div class="event-block-title">
                                {!! $level->title !!}
                            </div>
                            <div class="event-block-school"></div>
                            <a class="event-block-btn" href="{{url('event/'.$level->slug)}}">More Info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="home-events-links">
                <a class="link-btn" href="">View all events</a>
                <a class="link-btn" href="{{url('calendar')}}">Calender</a>
                <a class="link-btn" href="">
                    <i class="fa fa-download"></i>
                    Academic Calender 2022-2023
                </a>
            </div>
        </div>
    </section>
@endsection
