<div class="container" id="activity">
    <div class="card card-container col-md-offset-1 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.2s"
         style="margin-top: 100px;"
         dir="rtl">
        <div class="card-header text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">
            طلب منشط
        </div>
        <div class="card-body " data-wow-duration="1s" data-wow-delay="1.6s">
            <form method="POST" action="{{ url('/requestActivity/add') }}" aria-label="{{ __('Login') }}"
                  enctype="multipart/form-data" id="activity_form">
                @csrf
                <div class="form-group row">
                    <div class="col-md-offset-1 col-md-11 col-sm-12">
                        <label for="activity_name"
                               class="col-md-4 col-sm-12 col-form-label text-md-right wow fadeInRight"
                               data-wow-duration=".5s" data-wow-delay="1.0s">أسم مقدم
                            الطلب</label>

                        <div class="col-md-5 col-sm-12">
                            <input id="activity_name" type="text" data-wow-duration=".5s" data-wow-delay="1.4s"
                                   class="wow fadeInLeft  form-control col-md-12 col-sm-12{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row margin-btm">
                    <div class="col-md-offset-1 col-md-11 col-sm-12 wow fadeIn" data-wow-duration="1.1s"
                         data-wow-delay=".9s">
                        <label class="col-md-4 col-sm-12 wow zoomInUp" data-wow-duration="1.5s" data-wow-delay=".9s"
                               for="activity_city_id">المدينه</label>
                        <div class="col-md-5 col-sm-12">
                            <select id="activity_city_id" class="wow slideInDown form-control col-md-12 col-sm-12"
                                    data-wow-duration="2.5s" data-wow-delay="1.0s" name="city_id"
                                    required dir="rtl">
                                <option value="0">إختر مدينه</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="city" id="activity_city">
                        </div>
                    </div>
                </div>

                <div class="form-group row margin-btm">
                    <div class="col-md-offset-1 col-md-11 col-sm-12">
                        <label class="col-md-4 col-sm-12" for="activity_neighborhood_id">الحي</label>
                        <div class="col-md-5 col-sm-12">
                            <select id="activity_neighborhood_id" class="form-control col-md-12 col-sm-12"
                                    name="neighborhood_id"
                                    required dir="rtl">
                                <option value="0">إختر حي</option>
                            </select>
                            <input type="hidden" name="neighborhood" id="activity_neighborhood">
                        </div>
                    </div>
                </div>

                <div class="form-group row margin-btm">
                    <div class="col-md-offset-1 col-md-11 col-sm-12">
                        <label class="col-md-4 col-sm-12" for="activity_mosque_id">المسجد</label>
                        <div class="col-md-5 col-sm-12">
                            <select id="activity_mosque_id" class="form-control col-md-12 col-sm-12" name="mosque_id"
                                    required
                                    dir="rtl">
                                <option value="">إختر مسجد</option>
                            </select>
                            <input type="hidden" name="mosque" id="activity_mosque">
                        </div>
                    </div>
                </div>


                <div class="form-group row ">
                    <div class="col-md-offset-1 col-md-11 col-sm-12">
                        <label for="activity_day"
                               class="col-md-4 col-sm-12">اليوم المقترح</label>
                        <div class="col-md-5 col-sm-12">
                            <input id="activity_day" type="date"
                                   class="form-control col-md-12 col-sm-12{{ $errors->has('strengths') ? ' is-invalid' : '' }} "
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

                <div class="form-group row margin-btm">
                    <div class="col-md-offset-1 col-md-11 col-sm-12">
                        <label class="col-md-4 col-sm-12" for="imam_id">الداعيه</label>
                        <div class="col-md-5 col-sm-12">
                            <select id="imam_id" class="form-control col-md-12 col-sm-12" name="imam_id"
                                    required
                                    dir="rtl">
                                <option value="0">أي داعيه</option>
                                @foreach($imams as $imam)
                                    <option value="{{$imam->id}}">{{$imam->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-7  col-md-offset-5">
                        <button type="submit" class="btn btn-primary col-sm-offset-1">
                            إضافه طلب محاضره
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>