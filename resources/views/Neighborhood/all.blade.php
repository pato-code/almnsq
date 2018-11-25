@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/neighborhood/add')  }}" class="btn btn-success">إضافة المدن</a>
                كل الأحياء
            </div>
            <div class="card-body table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <td>
                            رقم الحي
                        </td>
                        <td>
                            أسم الحي
                        </td>
                        <td>
                            أسم المدينه
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($neighborhoods as $neighborhood)
                        <tr>
                            <td>{{$neighborhood->id}}</td>
                            <td>{{$neighborhood->name}}</td>
                            <td>{{$neighborhood->city->name}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection