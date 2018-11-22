@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                عرض تنبيه
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>اليوم</td>
                        <td>التاريخ</td>
                        <td>الفتره</td>
                        <td>أسم الموقع</td>
                        <td>نوع المنشط</td>
                        <td>أسم طالب المنشط</td>
                        <td>عنوان المنشط</td>
                        <td>المدينه</td>
                        <td>الحي</td>
                        <td>الحاله</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            @php


                                //Convert it to DD-MM-YYYY


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
                        <td>{{$notification->data["day"]}}</td>
                        <td>
                            @if($notification->data["period_id"] != null)
                                {{$notification->data["period"]["name"]}}
                            @else
                                لم يتم تحديد المدة
                            @endif
                        </td>

                        <td>
                            @if(array_key_exists("location" , $notification->data))
                                {{$notification->data["location"]["name"]}}
                            @endif
                        </td>
                        <td>
                            @if(array_key_exists("type" , $notification->data))
                                {{$notification->data["type"]["name"]}}
                            @endif
                        </td>
                        <td>
                            @if($notification->data["request_name"] != null)
                                {{$notification->data["request_name"]}}
                            @else
                                لا يوجد
                            @endif
                        </td>
                        <td>{{$notification->data["name"]}}</td>
                        <td>
                            @if(array_key_exists("city" , $notification->data))
                                {{$notification->data["city"]["name"]}}
                            @endif
                        </td>
                        <td>
                            @if(array_key_exists("nieghborhood" , $notification->data))
                                {{$notification->data["nieghborhood"]["name"]}}
                            @endif
                        </td>
                        <td>
                            @if($notification->data["status"]["name"] == "toImam")
                                <a href="{{url('/activity/accept/' . $notification->data["id"])}}"
                                   class="btn btn-primary">تأكيد طلب النشاط</a>
                            @elseif($notification->data["status"]["name"] == "create")
                                بإنتظار تأكيد المدير
                            @elseif ($notification->data["status"]["name"] == "accept")
                                تم تأكيده
                            @else
                                تم رفضه
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection