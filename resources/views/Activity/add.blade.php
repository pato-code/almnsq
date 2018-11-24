@extends('layouts.almnsq' , ["addActivity" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;margin-bottom: 1%;"
             dir="rtl">
            <div class="card-header">
                إضافة نشاط
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('/activity/add')}}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="name" class="pull-left col-md-4 col-sm-12">عنوان المنشط</label>
                            <div class="col-md-5">
                                <input id="name" type="text"
                                       class="form-control col-md-12 col-sm-12 form-control{{ $errors->has('strengths') ? ' is-invalid' : '' }} "
                                       name="name"
                                />

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-inline row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                             data-wow-delay=".9s">
                            <label class="pull-left col-md-4 col-sm-12 wow zoomInUp" data-wow-duration="1.5s"
                                   data-wow-delay=".9s" for="type_id">النوع</label>
                            <select id="type_id" class="wow slideInDown col-md-offset-2 col-md-5 col-sm-12"
                                    data-wow-duration="2.5s" data-wow-delay="1.0s" name="type_id" style="right: 2%;"
                                    required dir="rtl">
                                <option value="0">إختر النوع</option>
                                @foreach($types as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-inline row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                             data-wow-delay=".9s">
                            <label class="pull-left col-md-4 col-sm-12 wow zoomInUp" data-wow-duration="1.5s"
                                   data-wow-delay=".9s" for="city_id">المدينه</label>
                            <select id="city_id" class="wow slideInDown col-md-offset-2 col-md-5 col-sm-12"
                                    data-wow-duration="2.5s" data-wow-delay="1.0s" name="city_id" style="right: 2%;"
                                    required dir="rtl">
                                <option value="0">إختر مدينه</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-inline row margin-btm">
                        <div class="col-md-offset-1 col-md-11  col-sm-12">
                            <label class="pull-left col-md-4" for="neighborhood_id">الحي</label>
                            <select id="neighborhood_id" class="col-md-offset-2 col-md-5 col-sm-12"
                                    name="neighborhood_id"
                                    style="right: 2%;"
                                    required dir="rtl">
                                <option value="0">إختر حي</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-inline row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label class="pull-left col-md-4 col-sm-12" for="mosque_id">المسجد</label>
                            <select id="mosque_id" class="col-md-offset-2 col-md-5 col-sm-12" name="mosque_id"
                                    style="right: 2%;"
                                    required
                                    dir="rtl">
                                <option value="0">إختر مسجد</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="day" class="pull-left col-md-4 col-sm-12">يوم المنشط</label>
                            <div class="col-md-5">
                                <input id="day" type="date"
                                       class="form-control col-md-12 col-sm-12 form-control{{ $errors->has('strengths') ? ' is-invalid' : '' }} "
                                       name="day"
                                />

                                @if ($errors->has('strengths'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('strengths') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-inline row  margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label class="pull-left col-md-4 col-sm-12"
                                   for="period_id">الفتره</label>
                            <select id="period_id" class="wow slideInDown col-md-offset-2 col-md-5 col-sm-12"
                                    data-wow-duration="2.5s"
                                    data-wow-delay="1.0s" name="period_id" style="right: 2%;"
                                    required dir="rtl">
                                <option value="0">إختر الفتره</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-7 col-md-offset-5  col-sm-8 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">
                                إضافه منشط
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection