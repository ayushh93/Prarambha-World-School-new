@extends('layouts.frontend')

@section('main-content')
    <section class="news-events">
        <div class="container">
          <div class="row w-100 row-box">
            <div class="col-lg-8 col-md-7 border-right">
              <div class="news-events-details">
                <div class="news-events-image">
                  <img src="{{asset('uploads/level/'.$event->image)}}" alt="News Event Image">
                </div>
                <div class="news-events-text">
                  <h4>{!! $event->title !!}</h4>
                  <span><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($event->level_date)->format('M d, Y')}}, &ensp;&ensp;&ensp; <strong>Level:</strong> {{$event->school->title}}
                  </span>
                  <p>{!! $event->description !!}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-5">
              <div class="single-page-sidebar">
                <div class="single-page-sidebar-heading">
                  <h5>Related News & Events</h5>
                </div>
                <div class="single-page-sidebar-list">
                    @if($Recentevents)
                  <ul>
                      @foreach($Recentevents as $recent)
                    <li>
                        <a href="{{url('event/'.$recent->slug)}}">{!! $recent->title !!}</a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
