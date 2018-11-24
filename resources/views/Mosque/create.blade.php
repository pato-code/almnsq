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
                <form id="add_mosque" method="POST" action="{{ url('/mosque/add') }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="location_id" class="pull-left col-md-4 col-sm-12">أسم الجهه</label>
                            <div class="col-md-5">
                                @foreach($locations as $location)
                                    <div class="col-md-4">
                                        <label class="radio-inline pull-right">{{$location->name}}</label>
                                        <input class="form-control" type="radio" name="location_id"
                                               value="{{$location->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                             data-wow-delay=".9s">
                            <label class="col-md-4 col-sm-12 wow zoomInUp" for="city_id">المدينه</label>
                            <div class="col-md-5">
                                <select id="city_id" class="form-control col-md-12 col-sm-12"
                                        name="city_id" style="" required dir="rtl">
                                    <option value="0">إختر مدينه</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                             data-wow-delay=".9s">
                            <label class="col-md-4 col-sm-12" for="neighborhood_id">الحي</label>
                            <div class="col-md-5">
                                <select id="neighborhood_id" class="form-control col-md-12 col-sm-12"
                                        name="neighborhood_id"
                                        required dir="rtl">
                                    <option value="0">إختر حي</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                             data-wow-delay=".9s">
                            <label for="name"
                                   class="col-md-4 col-sm-12">أسم المسجد</label>

                            <div class="col-md-5">
                                <input id="name" type="text"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
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