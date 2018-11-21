@extends('layouts.almnsq')

@section('content')
    <div class="row container" style="margin-top: 100px;margin-bottom: 100px;">

        <div class="col-md-6 col-sm-12" >
            <div class="card" dir="rtl" style="background: rgba(0,0,0,0.6);color: white;">
                <div class="card-header col-sm-12 text-center">
                    تسجيل الدخول
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-sm-12 col-md-4 col-form-label text-md-right">أسم المستخدم</label>

                            <div class="col-md-6 col-sm-12">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-sm-12 col-md-4 col-form-label text-md-right">كلمة المرور</label>

                            <div class="col-md-6 col-sm-12">
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
                            <div class="col-md-6 col-offset-md-4 col-sm-12">
                                <div class="form-check col-sm-12">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12 col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل دخول
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    نسيت كلمة المرور
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--<div class="col-md-6">--}}
        {{--</div>--}}
    </div>
@endsection


