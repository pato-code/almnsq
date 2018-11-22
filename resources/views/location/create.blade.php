@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                إضافه جهه
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/location/add') }}" aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-4 col-form-label text-md-right">أسم الجهه</label>

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
                                إضافه الجهه
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection