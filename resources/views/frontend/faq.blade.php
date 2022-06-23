@extends('layouts.frontend')
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
@section('main-content')
     <div class="accordion-content">
            <h2>FAQ</h2>
            
            @if($faqs)
            @foreach($faqs as $key=>$faq)
            <div class="accordion-item">
                <header class="item-header">
                    <h4 class="item-question">
                        {!! $faq->title !!}
                    </h4>
                    <div class="item-icon">
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </header>
                <div class="item-content">
                    <p class="item-answer">
                         {!! $faq->description !!}
                    </p>
                </div>
            </div>
            @endforeach
         @endif
           
        </div>

@endsection