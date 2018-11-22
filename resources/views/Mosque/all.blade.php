@extends('layouts.almnsq' , ["mosque" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                <a href="{{ url('/mosque/add')  }}" class="btn btn-success">إضافة مسجد</a>
                كل المساجد
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <td>
                            رقم المسجد
                        </td>
                        <td>
                            الأسم
                        </td>
                        <td>
                            نوع المنطقه
                        </td>
                        <td>
                            أسم الحي
                        </td>
                        <td>
                            أسم المدينه
                        </td>
                        <td>
                            الإمام
                        </td>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($mosques as $mosque)

                        <tr>
                            <td>{{$mosque->id}}</td>
                            <td>{{$mosque->name}}</td>
                            <td>{{$mosque->location->name}}</td>
                            <td>{{$mosque->neighborhood->name}}</td>
                            <td>{{$mosque->neighborhood->city->name}}</td>
                            @if($mosque->imam != null)
                                <td>{{$mosque->imam->name}}</td>
                                
                            @else
                                <td>
                                    <form method="post" action="{{url('/mosque/addImam/'.$mosque->id)}}">
                                        @csrf
                                        <div class="form-inline">
                                            <input list="imams" id="imam_name" name="name" />
                                                <datalist id="imams">
                                                    @foreach($imams as $imam)
                                                        <option>{{$imam->name}}</option>
                                                    @endforeach
                                                </datalist>
                                            <input type="submit" class="btn btn-primary" value="إضافه الإمام" />
                                        </div>
                                    </form>
                            @endif
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection