@extends('layouts.almnsq' , ["activityWeek" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;padding-bottom: 25%;"
        >
            <div class="card-header">
                <div class="text-center">
                    التقييم {{$rate_base}}
                </div>

            </div>
            <div class="card-body">

                    <!-- progress 1 -->
                    @forelse($rates as $rate)
                        <div class="progressbar row  col-xs-12">
                            <div class="progress-title col-md-4 col-xs-12 " style="margin-left: 0%;">
                                <span class="title">{{$rate["id"]}} رقم </span>
                                <span class="value">{{$rate["rate"]}} من {{$week_count}}</span>
                            </div>


                            <div class="progress col-xs-12 col-md-8 " style="padding: 0% !important;">
                                <div class="progress-bar" role="progressbar"
                                     data-transitiongoal="{{$rate["width"]}}"
                                     style="width: 0%; background-color: {{$rate["color"]}}; "
                                     aria-valuenow="0">
                                </div>
                            </div>
                        </div>

                        {{--<div class="progressbar">--}}
                        {{--<div class="progress-title">--}}
                        {{--<span class="title"></span>--}}
                        {{--<span class="value"></span>--}}
                        {{--</div>--}}
                        {{--<div class="progress">--}}
                        {{--<div class="progress-bar" role="progressbar" aria-valuenow="{{$rate["width"]}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$rate["width"]}}%;">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    @empty
                        لا يوجد تقيمات هذا الأسبوع
                @endforelse
                <!-- .progressbar end -->

                </div>
            </div>

    </div>
@endsection