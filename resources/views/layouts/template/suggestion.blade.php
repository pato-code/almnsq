<div class="container" id="suggestion">
    <div class="card card-container col-md-offset-1 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.2s"
         style="margin-top: 100px;"
         dir="rtl">
        <div class="card-header text-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">
            إضافه مقترح أو شكوى
        </div>
        <div class="card-body " data-wow-duration="1s" data-wow-delay="1.6s">
            <form method="POST" action="{{ url('/suggestion/add') }}" aria-label="{{ __('Login') }}"
                  enctype="multipart/form-data" id="suggestion_form">
                @csrf
                <div class="form-group row">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="name"
                               class="col-md-4 col-sm-12 col-form-label text-md-right wow fadeInRight"
                               data-wow-duration=".5s" data-wow-delay="1.0s">أسم مقدم
                            الطلب</label>

                        <div class="col-md-5 col-sm-12">
                            <input id="suggestion_name" type="text" data-wow-duration=".5s" data-wow-delay="1.4s"
                                   class="wow fadeInLeft  form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
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


                <div class="form-inline row margin-btm">
                    <div class="col-md-offset-1 col-md-11">
                        <label class="pull-left col-md-4" for="type_id">النوع</label>
                        <select id="type_id" class="col-md-offset-2 col-md-5" name="type_id" style="right: 2%;"
                                required
                                dir="rtl">
                            @foreach($suggesstions_type as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row ">
                    <div class="col-md-offset-1 col-md-11">
                        <label for="suggestion_body"
                               class="col-sm-4 col-form-label text-md-right">المقترح أو الشكوى</label>
                        <div class="col-md-5">
                            <textarea id="suggestion_body" type="text"
                                      class="form-control{{ $errors->has('strengths') ? ' is-invalid' : '' }} "
                                      name="body"
                            ></textarea>
                            @if ($errors->has('strengths'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('strengths') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-7  col-md-offset-5">
                        <button type="submit" class="btn btn-primary col-sm-offset-1">
                            إضافه شكوى أو مقترح
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>