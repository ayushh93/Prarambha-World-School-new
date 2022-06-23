@extends('layouts.frontend')

@section('main-content')
    <section id="homeAbout">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-6">
                    <div class="home-abt-title wow fadeInUp delay-0.5s ease animated">
                        <h1 class="large label">About Us</h1>
                        <div class="title-bar"></div>
                        <div class="home-abt-sub-title-dark">

                            <body style="background-color:teal">
                            <p>
                                {!! $about->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('uploads/about/'.$about->image)}}" class="rounded" width="100%" height="336">
                    <div class="home-abt-text wow fadeInUp delay-0.4s ease animated">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
