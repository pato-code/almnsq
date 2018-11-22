@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                عرض تنبيه
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>
                            أسم مقدم الطلب
                        </td>
                        <td>
                            أسم المسجد
                        </td>
                        <td>
                            أسم إمام المسجد
                        </td>
                        <td>

                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($notifications as $notification)
                        <tr>
                            <td>{{$notification->data["name"]}}</td>
                            <td>{{$notification->data["mosque"]["name"]}}</td>
                            <td>
                                @if($notification->data["mosque"]["imam"] !=null)
                                    {{$notification->data["mosque"]["imam"]["name"]}}
                                @else
                                    <a href="{{url('/mosque/addImam/'.$notification->data["mosque"]["id"])}}"
                                       class="btn btn-success">
                                        إضافه إمام
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('/notification/'.$notification->id)}}" class="btn btn-primary">
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