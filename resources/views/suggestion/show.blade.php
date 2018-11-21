@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
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
                            النوع
                        </td>
                        <td>
                            النص
                        </td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$notification->data["data"]["name"]}}</td>
                        <td>{{$notification->data["type"]["name"]}}</td>

                        <td>
                            {{$notification->data["data"]["body"]}}

                        </td>
                        <td>
                            @if($notification->unread())
                                <a class="btn btn-primary" href="{{url('/notificationSuggestion/markAsRead/'.$notification->id)}}">إضافه إلي الإشعارات المقروءه</a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection