@extends('layouts.almnsq',['mosque' => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                إضافه مسجد
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/mosque/add') }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-inline row margin-btm">
                        <label class="col-sm-6">أسم الجهه</label>
                        <div class="col-sm-6">
                            @foreach($locations as $location)
                                <div class="col-sm-3">
                                    <label class="radio-inline pull-right">{{$location->name}}</label>
                                    <input class="form-control" type="radio" name="location_id"
                                           value="{{$location->id}}">
                                </div>
                                {{--<label class="radio-inline"><input type="radio" name="optradio">Option 2</label>--}}
                                {{--<label class="radio-inline"><input type="radio" name="optradio">Option 3</label>--}}
                                {{--<option value="{{$location->id}}">{{$location->name}}</option>--}}
                            @endforeach
                        </div>
                    </div>
                    <div class="form-inline row margin-btm">
                        <label class="pull-left col-sm-4" for="city_id">المدينه</label>
                        <select class="col-md-offset-2 col-md-4" id="city_id" class="form-control col-md-4"
                                name="city_id" style="" required dir="rtl">
                            <option value="0">إختر مدينه</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-inline row margin-btm">
                        <label class="pull-left col-sm-4" for="city_id">الحي</label>
                        <select id="neighborhood_id" class="col-md-offset-2 col-md-4" name="neighborhood_id"
                                style="right: 2%; margin-bottom: " required dir="rtl">
                            <option value="0">إختر حي</option>
                        </select>
                    </div>

                    <div class="form-group row margin-btm">
                        <label for="name"
                               class="col-sm-4 col-form-label text-md-right">أسم المسجد</label>

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
    <script>

    </script>
@endsection