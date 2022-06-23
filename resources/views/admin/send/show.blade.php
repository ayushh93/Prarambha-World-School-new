@extends('layouts.admin')

@section('main-content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('send.index')}}">Message Lists</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Message Details</h4>
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <ul class="list-group col-md-12">
                        <li class="list-group-item">
                            <strong>Name</strong> : {{ $send->title }}
                        </li>

                        <li class="list-group-item">
                            <strong> Send Date</strong> : {{ \Carbon\Carbon::parse($send->created_at)->format('M d, Y') }}
                        </li>

                        <li class="list-group-item">
                            <strong> Email</strong> : {{ $send->email }}
                        </li>

                        <li class="list-group-item">
                            <strong> Subject</strong> : {{ $send->subject  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Message</strong> : {!! $send->description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Send At</strong> : {{ $send->created_at->diffForHumans() }}
                        </li>

                    </ul>
                </table>

            </div>
            <!-- Default Basic Forms End -->

        </div>
    </div>
@endsection
