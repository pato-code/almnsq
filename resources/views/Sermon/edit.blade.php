@extends('layouts.almnsq',["sermon" => true])
@section('content')
    <div class="container" style="margin-top: 100px;margin-bottom: 100px;">
        <div class="card card-container"
             style="margin-top: 100px;"
             dir="rtl">
            <div class="card-header">
                تعديل خطبه
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/sermon/edit/' . $sermon->id) }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="title"
                                   class="pull-left col-md-4 col-sm-12">نص الخطبه</label>

                            <div class="col-md-5">
                            <textarea id="title" type="title"
                                      class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                      required autofocus >
                                {{$sermon->title}}
                            </textarea>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label class="col-md-4 col-sm-12" for="mosque_id">المسجد</label>
                            <div class="col-md-5">
                                <select id="mosque_id" class="form-control col-md-12 col-sm-12"
                                        name="mosque_id"
                                        required dir="rtl">
                                    @foreach($mosques as $mosque)
                                        <option {{$sermon->mosque_id == $mosque->id ? "selected" : ''}} value="{{$mosque->id}}">{{$mosque->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="photo" class="col-md-4 col-sm-12">صورة الخبر</label>
                            <div class="col-md-5">
                                <input id="photo" type="file"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                       name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="file" class="col-md-4 col-sm-12">إضافة ملف</label>
                            <div class="col-md-5">
                                <input id="file" type="file"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                       name="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-sm-10 col-sm-offset-2 col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                تعديل الخطبة
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection