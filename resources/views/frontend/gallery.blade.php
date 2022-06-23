@extends('layouts.frontend')

@section('main-content')
    <section id="homeGallery" class="container-fluid mx-auto">
        <div class="container">
            <h1 class="section-title label pb-12">Gallery</h1>
            <div class="title-bar w-full mx-auto"></div>
            <div id="galleryFlex" class="d-flex flex-wrap gap-3 justify-content-between align-items-center max-w-5xl mx-auto px-6 mt-4">
                @foreach($gallery as $gall)
                <a data-fancybox="gallery" href="https://lipsum.app/id/66/1600x1200">
                    <img class="rounded mb-2" src="https://lipsum.app/id/66/200x150">
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
