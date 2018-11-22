@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                كل الإعلانات و الأخبار
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>العنوان</td>
                            <td>المحتوي</td>
                            <td>النوع</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $new)
                            <tr>
                                <td>{{$new->title}}</td>
                                <td>{{$new->text}}</td>
                                <td>{{$new->type->name}}</td>
                                <td>
                                    <a href="{{url('/news/addSlider' . $new->id)}}" class="btn btn-primary">
                                        إضافه إلي العارض
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