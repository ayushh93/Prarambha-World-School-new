@extends('layouts.admin')

@section('main-content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                @include('message.message')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Online Form Data</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th class="table-plus datatable-nosort">Image</th>
                            <th>Title</th>
                            <th>Applied For</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onlineform as $key=>$online)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <img src="{{asset('uploads/form/'.$online->image)}}" alt="" height="80px;" width="80px">
                                </td>
                                <td class="table-plus">{{$online->name}}</td>
                                <td class="table-plus">{{$online->appliedgrade}}</td>
                                <td class="table-plus">{{$online->applicantsemail}}</td>
                                <td class="table-plus">{{$online->applicantscontact}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('onlineform.show',$online->id)}}"><i class="dw dw-eye"></i> Show</a>
{{--                                            <a class="dropdown-item" href="{{route('onlineform.edit',$online->id)}}"><i class="dw dw-edit2"></i> Edit</a>--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
@endsection