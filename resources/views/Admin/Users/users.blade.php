@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                <h1 class="text-center"> المستخدمين </h1>
            </div>
            <div class="card-body">

                <table class="table table-responsive">
                    <thead>
                    <tr>

                        <th>اسم المستخدم</th>
                        <th>ايميل المستخدم</th>
                        <th>نوع المستخدم</th>

                        {{--<th>تاريخ الادخال</th>--}}
                        {{--<th>تاريخ التحرير</th>--}}
                        <th></th>

                        {{--<th>تعديل</th>--}}
                        {{--<th>حذف</th>--}}
                    </tr>
                    </thead>

                    @if($users)
                        <tbody>
                        @foreach($users as $user)
                            <tr>


                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                {{--<td>{{$user->group->name}}</td>--}}


                                {{--<td>{{$user->created_at}}</td>--}}
                                {{--<td>{{$user->updated_at}}</td>--}}
                                <td>{{$user->group->name}}</td>

                                @if($user->status == 0)
                                    <td>

                                        <a href="{{url('/admin/user/activate/' . $user->id)}}">
                                            <button class="btn btn-success">
                                                تأكيد التفعيل
                                            </button>
                                        </a>

                                    </td>
                                @endif


                                {{--<td><a href="{{route('admin.edit' , $user->id)}}"> <button class="btn btn-primary" > تعديل </button> </a></td>--}}

                                {{--<td>--}}

                                {{--{!! Form::open([ 'method'=>'DELETE' , 'action'=>['UsersController@destroy' , $user->id] ]) !!}--}}

                                {{--<div class="form-group">--}}
                                {{--{!! Form::submit('حذف' , ['class'=>'btn btn-danger']) !!}--}}
                                {{--</div>--}}

                                {{--{!! Form::close() !!}--}}

                                {{--</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>


@endsection