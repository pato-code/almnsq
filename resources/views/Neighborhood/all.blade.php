@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/neighborhood/add')  }}" class="btn btn-success">إضافة المدن</a>
                كل الأحياء
            </div>
            <div class="card-body">
                <table class="table table-responsive">
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