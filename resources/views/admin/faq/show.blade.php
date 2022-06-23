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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('faq.index')}}">Faq Lists</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-success " href="{{route('faq.edit',$faq->id)}}" role="button" style="border-radius: 50%">
                                <i class="fa fa-edit"></i> Edit Faq
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Faq Details</h4>
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <ul class="list-group col-md-12">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $faq->title }}
                        </li>

                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $faq->description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $faq->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $faq->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>

            </div>
            <!-- Default Basic Forms End -->

        </div>
    </div>
@endsection
c
