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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('partner.index')}}">Partner Lists</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Update Partner</h4>
                    </div>
                </div>
                <form action="{{route('partner.update',$partner->id)}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"> Title</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="title" value="{{$partner->title}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                        <div class="col-sm-12 col-md-6">
                            <input type="file" name="image">
                        </div>
                        @if(isset($partner))
                            <div class="col-sm-12 col-md-4">
                                <img src="{{asset('uploads/partner/'.$partner->image)}}" alt="" height="80px" width="80px">
                            </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"></label>
                        <div class="col-sm-12 col-md-10">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Default Basic Forms End -->

        </div>
    </div>
@endsection
