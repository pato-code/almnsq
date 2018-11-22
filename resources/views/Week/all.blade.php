@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 150px;"
             dir="rtl">
            <div class="card-header">

                <div class="pull-left">
                    أنشطة الأسبوع
                </div>
                <div class="pull-right">
                    <a href="{{url('/week/add')}}" class="btn btn-success">تعديل عدد الأنشطه</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <td>
                            اليوم
                        </td>
                        <td>
                            التاريخ
                        </td>

                        <td>
                            الفترة
                        </td>
                        <td>
                            إسم الداعيه
                        </td>
                        <td>أسم الموقع</td>
                        <td>نوع المنشط</td>
                        <td>عنوان المنشط</td>
                        <td>المدينه</td>
                        <td>الحي</td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($activities as $activity)
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
                            <td>{{$activity->imam->name}}</td>
                            <td>{{$activity->location->name}}</td>
                            <td>
                                @if($activity->type != null)
                                    {{$activity->type->name}}
                                @endif
                            </td>
                            <td>{{$activity->name}}</td>
                            <td>{{$activity->city->name}}</td>
                            <td>{{$activity->nieghborhood->name}}</td>
                            <td>
                                @if($activity->status->name == "create")
                                        <a href="{{url('/week/accept/'.$activity->id)}}" class="btn btn-primary col-md-6 col-sm-12">موافقه علي النشاط</a>
                                        <a href="{{url('/week/deny/'.$activity->id)}}" class="btn btn-danger col-md-5 col-md-offset-1 col-sm-12">رفض النشاط</a>
                                @elseif($activity->status->name == "toImam")
                                    بإنتظار موافقه الإمام
                                @elseif($activity->status->name == "accept")
                                    تم الموافقه عليه
                                @else
                                    تم رفضه
                                @endif

                            </td>
                        </tr>
                    @empty
                        لا يوجد أي نشاطات هذا الإسبوع
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection