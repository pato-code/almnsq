@extends('layouts.almnsq',["sermon" => true])
@section('content')
    <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="card"
             style="margin-top: 100px;margin-bottom: 15%; background: rgba(0,0,0,0.7);font-size: 22px;color: white"
             dir="rtl">
            <div class="card-header">
                إضافه خطبه
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/addSermon') }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-12 col-md-4 col-form-label text-md-right">نص الخطبه</label>

                        <div class="col-md-6 col-sm-12">
                            <textarea id="title" type="title"
                                      class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                      required autofocus>
                            </textarea>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-inline row">
                        <label class="pull-left col-sm-12 col-md-4" for="mosque_id">المسجد</label>
                        <select id="mosque_id" class="form-control col-md-4 col-sm-offset-1 col-sm-8" name="mosque_id"
                                required dir="rtl">
                            @foreach($mosques as $mosque)
                                <option value="{{$mosque->id}}">{{$mosque->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline row">
                        <label class="col-sm-4 col-form-label text-md-right">إضافة ملف</label>
                        <div class="container">
                            <input id="file" type="file"
                                   class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }} col-md-4 col-sm-offset-1 col-sm-8"
                                   name="file">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                إضافه الخطبة
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection