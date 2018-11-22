@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                عرض تنبيه
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <td>
                            أسم مقدم الطلب
                        </td>
                        <td>
                            أسم المسجد
                        </td>
                        أسم إمام المسجد
                        <td>
                            الشكوي أو الإقتراح
                        </td>
                        <td>
                            ملاحظات أخري
                        </td>
                        <td>
                            المرفقات
                        </td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$notification->data["name"]}}</td>
                            <td>{{$notification->data["mosque"]["name"]}}</td>

                            <td>
                                @if($notification->data["mosque"]["imam"] !=null)
                                    {{$notification->data["mosque"]["imam"]["name"]}}
                                @else
                                    إضافه إمام
                                @endif
                            </td>
                            <td>{{$notification->data["strengths"]}}</td>
                            <td>{{$notification->data["notes"]}}</td>
                            <td>
                                @if($notification->data["file"] !=null)
                                    <a class="btn btn-success" href="{{asset('files').'/'.$notification->data["file"]}}">
                                        ملف مرفق

                                    </a>
                                @else
                                    لا يوجد مرفقات
                                @endif
                            </td>
                            <td>
                                @if($notification->unread())
                                    <a class="btn btn-primary" href="{{url('/notification/markAsRead/'.$notification->id)}}">إضافه إلي الإشعارات المقروءه</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection