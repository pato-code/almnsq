@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                <div class="pull-left">
                    كل الإعلانات و الأخبار
                </div>
                <div class="pull-right">
                    <a href="{{url('/news/add')}}" class="btn btn-primary">
                        إضافه خبر
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>العنوان</td>
                        <td>المحتوي</td>
                        <td>النوع</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{$new->title}}</td>
                            <td >{{$new->text}}</td>
                            <td>{{$new->type->name}}</td>
                            <td>
                                <a href="{{url('/news/edit/' . $new->id)}}" class="btn btn-success">
                                    تعديل الخبر
                                </a>

                            </td>
                            <td>
                                <a href="{{url('/news/remove/' . $new->id)}}" class="btn btn-danger">
                                    مسح الخبر
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection