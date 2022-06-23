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
                            <a class="btn btn-success " href="{{route('level.create')}}" role="button" style="border-radius: 50%">
                                <i class="fa fa-plus"></i> Add Level
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Level Lists</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th class="table-plus datatable-nosort">School Category</th>
                            <th class="table-plus datatable-nosort"> Title</th>
                            <th> Date</th>
                            <th>Image</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($levels as $key=>$level)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td class="table-plus">{{$level->school->title}}</td>
                                <td class="table-plus">{{$level->title}}</td>
                                <td class="table-plus">{{$level->level_date}}</td>
                                <td class="table-plus">
                                    <img src="{{asset('uploads/level/'.$level->image)}}" alt="" height="80px" width="80px">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{route('level.show',$level->id)}}"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="{{route('level.edit',$level->id)}}"><i class="dw dw-edit2"></i> Edit</a>
                                            {{Form::open(['url'=>route('level.destroy',$level->id),'onsubmit'=>"return confirm('Are you sure you want to delete this?')",'class'=>"form pull-left"])}}
                                            @method('delete')
                                            <button class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</button>
                                            {{Form::close()}}
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
