@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/sermon/add')  }}" class="btn btn-success">إضافة خطبة</a>
                كل الخطب
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>
                            رقم الخطبة
                        </td>
                        <td>
                            عنوان المحاضره
                        </td>
                        <td>
                            المسجد
                        </td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($sermons as $sermon)
                        <tr>
                            <td>{{$sermon->id}}</td>
                            <td>{{$sermon->title}}</td>
                            <td>{{$sermon->mosque->name}}</td>
                            <td>
                                <a href="{{url('sermon/edit/' . $sermon->id)}}" class="btn btn-success col-md-5 col-sm-5">
                                    التعديل
                                </a>
                                <a href="{{url('sermon/delete/' . $sermon->id)}}" class="btn btn-danger col-md-offset-1 col-sm-offset-1 col-md-5 col-sm-5">
                                    المسح
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection