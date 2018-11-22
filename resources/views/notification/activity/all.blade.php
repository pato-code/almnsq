@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                عرض طلب محاضره
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>
                            أسم مقدم الطلب
                        </td>
                        <td>
                            اليوم
                        </td>
                        <td>
                            أسم إمام
                        </td>
                        <td>
                            حالة الطلب
                        </td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($notifications as $notification)
                        <tr>
                            <td>{{$notification->data["request_name"]}}</td>
                            <td>
                                @php
                                    $dmy=Carbon\Carbon::createFromFormat('Y-m-d', $notification->data["day"]);

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
                            <td>
                                    {{$notification->data["imam"]["name"]}}
                            </td>
                            <td>
                                @if($notification->data["status"]["name"] == "create")
                                    بإنتظار موافقه المدبر
                                @elseif($notification->data["status"]["name"] == "toImam")
                                    بإنتظار موافقه الإمام
                                @elseif($notification->data["status"]["name"] == "accept")
                                    تم الموافقه عليه
                                @else
                                    تم رفضه
                                @endif
                            </td>
                            <td>
                                <a href="{{url('/notificationActivity/'.$notification->id)}}" class="btn btn-primary">
                                    عرض الإشعار
                                </a>
                            </td>
                        </tr>
                    @empty
                        لا يوجد أي إشعارات
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection