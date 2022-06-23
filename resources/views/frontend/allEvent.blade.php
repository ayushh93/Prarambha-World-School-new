@extends('layouts.frontend')

@section('main-content')
    <section id="homeEvents">
        <div class="container">
            <h2 class="section-title label">All Events</h2>
            <div class="title-bar mx-auto"></div>
            @if($levels)
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
                                    <div class="event-block-school">{{$level->school->title}}</div>
                                    <a class="event-block-btn" href="{{url('event/'.$level->slug)}}">More Info</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
    </section>
@endsection
