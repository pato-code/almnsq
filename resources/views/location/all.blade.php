@extends('layouts.almnsq')
@section('content')

    <section class="container bg-overlay-dark" style="margin-top: -100px;">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/location/add')  }}" class="btn btn-success">إضافة جهه</a>
                إضافه جهه
            </div>
            <div class="card-body" style="background: rgba(0,0,0,1);font-size: 22px;color: white">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <td>
                            رقم الجهه
                        </td>
                        <td>
                            أسم الجهه
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($locations as $location)
                        <tr>
                            <td>{{$location->id}}</td>
                            <td>{{$location->name}}</td>
                        </tr>
                    @empty
                        لا يوجد جهات
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection