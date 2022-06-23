@extends('layouts.frontend')

@section('main-content')
    <section id="homeAbout">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="home-abt-title wow fadeInUp delay-0.5s ease animated">
                        <h1 class="large label">Kindergarten</h1>
                        <div class="title-bar"></div>
                        <div class="home-abt-sub-title-dark">

                            <body style="background-color:teal">
                            <p>
                                {!! $kinder->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="">
                        <img src="{{asset('uploads/kinder/'.$kinder->image)}}" class="rounded" width="100%" height="300">
                        <div class="home-abt-text wow fadeInUp delay-0.4s ease animated">
                        </div>
                </div>
            </div>
        </div>

        <section id="portfolioPage" class="section-padd">
            <div class="container">
                @if($tabs)
                <ul class="nav nav-tabs justify-content-center">
                    @foreach($tabs as $key=>$tab)
                    <li class="nav-item">
                        <a @if($key == 0) class="nav-link active" @else class="nav-link" @endif data-toggle="tab" href="#tab{{$key}}">{{$tab->title}}</a>
                    </li>
                    @endforeach
                </ul>
                @endif

                <div class="tab-content">
                    @foreach($tabs as $key=>$tab)
                    <div id="tab{{$key}}"  @if($key == 0) class="tab-pane fadeInUp show active" @else class="tab-pane" @endif >
                              <div id="homeGallery inner-gallery" class="mx-auto">
                                    <div class="gallery-flex">
                                        <div class="row">
                                              @foreach($tabimages as $count=>$imag)
                                                 @if($imag->tab_id == $tab->id)
                                            <div class="col-lg-3 col-md-4">
                                                <div class="gallery-image">
                                                    <a href="{{asset('uploads/tabimage/'.$imag->image)}}" data-fancybox="gallery">
                                                        <img src="{{asset('uploads/tabimage/'.$imag->image)}}" alt="Image">
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                    </div>
                    @endforeach
        </section>
    </section>
@endsection
