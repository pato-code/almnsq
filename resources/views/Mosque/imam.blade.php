@extends('layouts.almnsq',['mosque' => true])
@section('content')
    <div class="container">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                إضافه مسجد
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/mosque/imam/add') }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-6 col-form-label text-md-right text-center" for="name">أسم الإمام</label>
                        <div class="col-sm-12 col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name"
                                   value="{{$name}}"
                                   required autofocus/>
                            <input id="mosque" name="mosque" type="hidden" value="{{$id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-12 col-md-6 col-form-label text-md-right text-center ">إسم
                            المستخدم</label>

                        <div class="col-sm-12 col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-12 col-md-6 col-form-label text-md-right text-center">كلمة
                            المرور</label>

                        <div class="col-sm-12 col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-sm-12 col-md-6 col-form-label text-md-right text-center">تأكيد
                            كلمة المرور</label>

                        <div class="col-sm-12 col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>


                    <div class="form-group row mb-0" dir="ltr">
                        <div class="col-md-6 col-sm-8 col-sm-offset-3 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                التسجيل
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection