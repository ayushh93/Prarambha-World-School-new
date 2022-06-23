@extends('layouts.frontend')

@section('main-content')
    <section id="homeAbout">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="home-abt-title wow fadeInUp delay-0.5s ease animated">
                        <h6 class="large label">{{$fee->title}}</h6>
                        <div class="title-bar"></div>
                        <div class="home-abt-sub-title-dark">

                            <body style="background-color:teal;">
                            <p>
                                {!! $fee->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="javascript:">
                        <img src="{{asset('uploads/facility/'.$fee->image)}}" class="rounded" width="100%" height="336">
                </div>
            </div>
        </div>
@endsection
