<div class="container" id="complement">
    <div class="card card-container  col-md-offset-1 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.2s"
         style="margin-top: 100px;"
         dir="rtl">
        <div class="card-header text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">
            تقييم مسجد
        </div>
        <div class="card-body " data-wow-duration="1s" data-wow-delay="1.6s">
            <form method="POST" action="{{ url('/complement/add') }}" aria-label="{{ __('Login') }}"
                  enctype="multipart/form-data" id="compliment_form">
                @csrf
                <div class="form-group row">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="name"
                               class="col-md-4 col-sm-12 col-form-label text-md-right wow fadeInRight" data-wow-duration=".5s" data-wow-delay="1.0s">أسم مقدم
                            الطلب</label>

                        <div class="col-md-5 col-sm-12">
                            <input id="name" type="text" data-wow-duration=".5s" data-wow-delay="1.4s"
                                   class="wow fadeInLeft  form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="location"
                               class="col-md-2 col-sm-12  col-form-label text-md-right wow fadeInDown" data-wow-duration="1.5s" data-wow-delay=".7s">إسم الجهه</label>
                        @forelse($locations as $location)
                            <div class="wow fadeInUpBig col-md-2 col-sm-10 col-sm-offset-1" data-wow-duration="1.5s" data-wow-delay=".7s">

                                <input id="location" type="radio"
                                       class="radio-inline{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width: 22px;
    height: 22px;" name="location"
                                       value="{{$location->id}} "  required autofocus>
                                {{$location->name}}
                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @empty
                            <div for="location"
                                 class="wow fadeInDown col-sm-2 col-sm-offset-2 col-form-label text-md-right" data-wow-duration="1.5s" data-wow-delay=".7s">
                                لا يوجد مناطق
                            </div>
                        @endforelse
                    </div>
                </div>


                <div class="form-inline row margin-btm">
                    <div class="col-md-offset-1 col-md-11 wow fadeIn" data-wow-duration="1.1s" data-wow-delay=".9s">
                        <label class="pull-left col-md-4 wow zoomInUp" data-wow-duration="1.5s" data-wow-delay=".9s" for="city_id">المدينه</label>
                        <select id="city_id" class="wow slideInDown col-md-offset-2 col-md-5" data-wow-duration="2.5s" data-wow-delay="1.0s" name="city_id" style="right: 2%;"
                                required dir="rtl">
                            <option value="0">إختر مدينه</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-inline row margin-btm">
                    <div class="col-md-offset-1 col-md-11">
                        <label class="pull-left col-md-4" for="neighborhood_id">الحي</label>
                        <select id="neighborhood_id" class="col-md-offset-2 col-md-5" name="neighborhood_id"
                                style="right: 2%;"
                                required dir="rtl">
                            <option value="0">إختر حي</option>
                        </select>
                    </div>
                </div>

                <div class="form-inline row margin-btm">
                    <div class="col-md-offset-1 col-md-11">
                        <label class="pull-left col-md-4" for="mosque_id">المسجد</label>
                        <select id="mosque_id" class="col-md-offset-2 col-md-5" name="mosque_id" style="right: 2%;"
                                required
                                dir="rtl">
                            <option value="0">إختر مسجد</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row hidden" id="mosque_div">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="mosque_name"
                               class="col-sm-4 col-form-label text-md-right">أسم المسجد</label>
                        <div class="col-md-5">
                            <input id="mosque_name" type="text"
                                   class="form-control{{ $errors->has('mosque_name') ? ' is-invalid' : '' }} "
                                   name="mosque_name"
                            >
                            @if ($errors->has('mosque_name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mosque_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="strengths"
                               class="col-sm-4 col-form-label text-md-right">لتقويه الطلب</label>
                        <div class="col-md-5">
                            <textarea id="strengths" type="text"
                                      class="form-control{{ $errors->has('strengths') ? ' is-invalid' : '' }} "
                                      name="strengths"
                            ></textarea>
                            @if ($errors->has('strengths'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('strengths') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="file"
                               class="col-sm-4 col-form-label text-md-right">إضافه ملف</label>
                        <div class="col-md-5">
                            <input id="file" type="file"
                                   class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }} " name="file"
                            />
                            @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="notes"
                               class="col-sm-4 col-form-label text-md-right">ملاحظات أخري</label>
                        <div class="col-md-5">
                            <input id="notes" type="text"
                                   class="form-control{{ $errors->has('notes') ? ' is-invalid' : '' }} "
                                   name="notes"
                            />
                            @if ($errors->has('notes'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-7  col-md-offset-5">
                        <button type="submit" class="btn btn-primary col-sm-offset-1">
                            إضافه تقييم
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>