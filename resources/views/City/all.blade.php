@extends('layouts.almnsq')
@section('content')

    <section class="container bg-overlay-dark" style="margin-top: -100px;">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/city/add')  }}" class="btn btn-success">إضافة المدن</a>
                كل المدن
            </div>
            <div class="card-body" style="background: rgba(0,0,0,1);font-size: 22px;color: white">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <td>
                            رقم المدينه
                        </td>
                        <td>
                            أسم المدينه
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection