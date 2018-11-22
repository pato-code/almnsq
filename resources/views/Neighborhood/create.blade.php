@extends('layouts.almnsq', ["neighborhood" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                إضافه مدينه
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/neighborhood/add') }}" aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-inline row">
                        <label for="title"
                               class="col-sm-4 col-form-label text-md-right">أسم الحي</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-inline row">
                        <label class="pull-left col-sm-4" for="city_id">المدينه</label>
                        <select id="type_id" class="form-control col-md-4" name="city_id" style="right: 2%;" required dir="rtl">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                إضافه الحي
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection