@extends('layouts.almnsq' , ["addNews" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                إضافه خبر
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/news/add') }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-12 col-md-4 col-form-label text-md-right">عنوان الخبر</label>

                        <div class="col-md-6">
                            <input id="title" type="title"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                   value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="text"
                               class="col-sm-4 col-form-label text-md-right">نص الخبر</label>

                        <div class="col-md-6">
                            <input id="text" type="text"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="text"
                                   value="{{ old('text') }}" required autofocus>

                            @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-inline row margin-btm">
                        <label class="pull-left col-md-4 col-sm-12" for="type_id">النوع</label>
                        <select id="type_id" class="form-control col-md-offset-2 col-md-5 col-sm-12" name="type_id"
                                style="right: 2%;" required dir="rtl">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label text-md-right">صورة الخبر</label>
                        <div class="col-md-6">
                            <input id="photo" type="file"
                                   class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                إضافه الخبر
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection