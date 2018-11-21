@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                إضافه مدينه
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/city/add') }}" aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-4 col-form-label text-md-right">أسم المدينه</label>

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
                                إضافه المدينه
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection