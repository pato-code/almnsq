@extends('layouts.almnsq' , ["activityWeek" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
        >
            <div class="card-header">
                <div class="pull-left">
                    إستيفاء النصاب من النشاطات
                </div>
            </div>
            <div class="card-body">
                <div class="pull-left col-md-2">
                    <a href="{{url('/activity/add')}}" class="btn btn-primary">إضافه نشاط</a>
                </div>
                </br>
                <div class="progressbar col-md-10 ">
                    <div class="progress-title pull-left">
                        <span class="title">إستيفاء النصاب من النشاطات</span>
                        <span class="value">{{$count}} من {{$week_count}}</span>
                    </div>


                    <div class="progress col-sm-12">
                        <div class="progress-bar week_activity" role="progressbar"
                             data-transitiongoal="{{$activity_percientige}}"
                             style="width: 0%; background-color: {{$color}}; margin-right: -7%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card"
             style="margin-top: 100px;margin-bottom: 2%; background: rgba(0,0,0,0.7);font-size: 22px;color: white">
            <div class="card-header">
                <div class="pull-left">
                    كل الأنشطه
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table" dir="rtl">
                    <thead>
                    <tr>
                        <td>اليوم</td>
                        <td>التاريخ</td>
                        <td>الفتره</td>
                        <td>أسم الموقع</td>
                        <td>نوع المنشط</td>
                        {{--<td>أسم طالب المنشط</td>--}}
                        <td>عنوان المنشط</td>
                        <td>المدينه</td>
                        <td>الحي</td>
                        <td>الحاله</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($activies as $activity)
                        <tr>
                            <td>
                                @php


                                    //Convert it to DD-MM-YYYY


                                    $dmy=Carbon\Carbon::createFromFormat('Y-m-d', $activity->day);

                                    $day = $dmy->format( 'l' );
                                    if($day == "Saturday"){
                                        $day = "السبت";
                                    } else if ($day == "Sunday"){
                                        $day = "الأحد";
                                    } else if ($day == "Monday") {
                                        $day = "الإثنين";
                                    } else if ($day == "Tuesday") {
                                        $day = "الثلاثاء";
                                    } else if ($day == "Wednesday") {
                                        $day = "الأربعاء";
                                    } else if ($day == "Thursday") {
                                        $day = "الخميس";
                                    } else {
                                        $day= "الجمعة";
                                    }
                                @endphp
                                {{$day}}
                            </td>
                            <td>{{$activity->day}}</td>
                            <td>
                                @if($activity->period != null)
                                    {{$activity->period->name}}
                                @else
                                    لم يتم تحديد المدة
                                @endif
                            </td>

                            <td>{{$activity->location->name}}</td>
                            <td>
                                @if($activity->type != null)
                                    {{$activity->type->name}}
                                @endif
                            </td>
                            {{--<td>--}}
                                {{--@if($activity->request_name != null)--}}
                                    {{--{{$activity->request_name}}--}}
                                {{--@else--}}
                                    {{--لا يوجد--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            <td>{{$activity->name}}</td>
                            <td>{{$activity->city->name}}</td>
                            <td>{{$activity->nieghborhood->name}}</td>
                            <td>
                                @if($activity->status == $toImam)
                                    <a href="{{url('/activity/accept/' . $activity->id)}}" class="btn btn-primary">تأكيد طلب النشاط</a>
                                @elseif($activity->status->name == "create")
                                    بإنتظار تأكيد المدير
                                @elseif ($activity->status->name == "accept")
                                    تم تأكيده
                                @else
                                    تم رفضه
                                @endif
                            </td>
                            <td>
                                <a href="{{url('/activity/edit/' . $activity->id)}}" class="btn btn-success">تعديل المشط</a>
                            </td>
                            <td>
                                <a href="{{url('/activity/delete/' . $activity->id)}}" class="btn btn-danger">مسح المشط</a>
                            </td>
                        </tr>
                    @empty
                        <div class="pull-left">
                            لا يوجد أي نشاطات هذا الإسبوع
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection