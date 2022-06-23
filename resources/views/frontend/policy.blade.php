@extends('layouts.frontend')

@section('main-content')
    <section id="homeAbout">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <div class="home-abt-title wow fadeInUp delay-0.5s ease animated">
                        <h6 class="large label">Policy</h6>
                        <div class="title-bar"></div>
                        <div class="home-abt-sub-title-dark">

                            <body style="background-color:teal;">
                            <p>
                               {!! $policy->description !!}
                            </p>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <a href="javascript:">--}}
{{--                        <img src="{{asset('uploads/policy/'.$policy->image)}}" class="rounded" width="100%" height="336">--}}
{{--                </div>--}}
            </div>
        </div>
        </div>
@endsection
