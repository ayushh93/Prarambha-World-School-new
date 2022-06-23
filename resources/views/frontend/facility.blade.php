@extends('layouts.frontend')

@section('main-content')
    <section id="homeAbout">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="home-abt-title wow fadeInUp delay-0.5s ease animated">
                        <h1 class="large label">Facilities</h1>
                        <div class="title-bar"></div>
                        <div class="home-abt-sub-title-dark">

                            <body style="background-color:teal">
                            <p>
                                {!! $facility->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="">
                        <img src="{{asset('uploads/facility/'.$facility->image)}}" class="rounded" width="100%" height="336">
                        <div class="home-abt-text wow fadeInRight delay-0.5s ease animated">
                        </div>
                    </a>
                </div>
            </div>
        </div>

@endsection
