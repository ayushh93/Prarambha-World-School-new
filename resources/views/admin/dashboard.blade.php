@extends('layouts.admin')

@section('main-content')
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <a href="{{route('onlineform.index')}}">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">
                                    {{ \App\Models\Onlineform::count()}}
                                </div>
                                <div class="weight-600 font-14">OnlineForm</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <a href="{{route('send.index')}}">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div id="chart2"></div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">
                                    {{ \App\Models\Send::count() }}
                                </div>
                                <div class="weight-600 font-14">Contact Message</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
{{--            <div class="col-xl-3 mb-30">--}}
{{--                <div class="card-box height-100-p widget-style1">--}}
{{--                    <div class="d-flex flex-wrap align-items-center">--}}
{{--                        <div class="progress-data">--}}
{{--                            <div id="chart3"></div>--}}
{{--                        </div>--}}
{{--                        <div class="widget-data">--}}
{{--                            <div class="h4 mb-0">350</div>--}}
{{--                            <div class="weight-600 font-14">Campaign</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 mb-30">--}}
{{--                <div class="card-box height-100-p widget-style1">--}}
{{--                    <div class="d-flex flex-wrap align-items-center">--}}
{{--                        <div class="progress-data">--}}
{{--                            <div id="chart4"></div>--}}
{{--                        </div>--}}
{{--                        <div class="widget-data">--}}
{{--                            <div class="h4 mb-0">$6060</div>--}}
{{--                            <div class="weight-600 font-14">Worth</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
