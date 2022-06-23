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
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('onlineform.index')}}">Onlineform Data Lists</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
{{--                            <a class="btn btn-success " href="{{route('onlineform.edit',$onlineform->id)}}" role="button" style="border-radius: 50%">--}}
{{--                                <i class="fa fa-edit"></i> Edit Event--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Student Details</h4>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <div class="col-md-4 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h4> Image</h4>
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/form'.'/'.$onlineform->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-8">
                        <li class="list-group-item">
                            <strong>Name</strong> : {{ $onlineform->name }}
                        </li>

                        <li class="list-group-item">
                            <strong>Date of Birth</strong> : {{ $onlineform->dob }}
                        </li>

                        <li class="list-group-item">
                            <strong>Place of Birth</strong> : {!! $onlineform->pob !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Gender</strong> : {!! $onlineform->gender !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Nationality</strong> : {!! $onlineform->nationality !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Mother Tongue</strong> : {!! $onlineform->mothertongue !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Religion</strong> : {!! $onlineform->religion !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Grade Applied For</strong> : {!! $onlineform->appliedgrade !!}
                        </li> <li class="list-group-item">
                            <strong>Academic Year</strong> : {!! $onlineform->academicyear !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Permanent Address</strong> : {!! $onlineform->stdntprmntaddress !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Current Address</strong> : {!! $onlineform->stdntcurrentaddress !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Last Academic Info</strong> : {!! $onlineform->lastinfo !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Co-cirricular Info</strong> : {!! $onlineform->activity !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Blood Group</strong> : {!! $onlineform->bloodgroup !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Height</strong> : {!! $onlineform->height !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Weight</strong> : {!! $onlineform->weight !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Medical Issues</strong> : {!! $onlineform->medicalissue !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Hostel Service</strong> : {!! $onlineform->hostel !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Transportation Service</strong> : {!! $onlineform->transportation !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Pickup point</strong> : {!! $onlineform->pickup_point !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Lunch</strong> : {!! $onlineform->lunch !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Veg/Non-veg</strong> : {!! $onlineform->veg_nonveg !!}
                        </li>
                        <li class="list-group-item">
                            <strong>After School</strong> : {!! $onlineform->afterschool !!}
                        </li>
                        <li class="list-group-item">
                            <strong>After School Program</strong> : {!! $onlineform->after_school_program !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Father's Name</strong> : {!! $onlineform->fathername !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Father's Contact No.</strong> : {!! $onlineform->fathercontact !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Mother's Name</strong> : {!! $onlineform->mothername !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Mother's Contact No.</strong> : {!! $onlineform->mothercontact !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Guardian's Name</strong> : {!! $onlineform->guardianname !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Guardian's Contact No.</strong> : {!! $onlineform->guardiancontact !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Sibling Info</strong> : {!! $onlineform->sibling !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Hear From</strong> : {!! $onlineform->hear !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Decleration Name</strong> : {!! $onlineform->delerationInput !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Decleration Role</strong> : {!! $onlineform->declareRole !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Applicant Contact No</strong> : {!! $onlineform->applicantscontact !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Applicant Email</strong> : {!! $onlineform->applicantsemail !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $onlineform->created_at->diffForHumans() }}
                        </li>
                    </ul>
                </table>

            </div>
            <!-- Default Basic Forms End -->

        </div>
    </div>
@endsection
