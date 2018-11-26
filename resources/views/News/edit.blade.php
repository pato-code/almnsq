@extends('layouts.almnsq' , ["addNews" => true])
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;"
             dir="rtl">
            <div class="card-header">
                إضافه خبر
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/news/edit/'.$news->id) }}" aria-label="{{ __('Login') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="title"
                                   class="col-md-4 col-sm-12">عنوان الخبر</label>

                            <div class="col-md-5 col-sm-12">
                                <input id="title" type="title"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                       value="{{ $news->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label for="text"
                                   class="col-md-4 col-sm-12">نص الخبر</label>

                            <div class="col-md-5 col-sm-12">
                                <input id="text" type="text"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       name="text"
                                       value="{{$news->text }}" required autofocus>

                                @if ($errors->has('text'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row margin-btm">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label class="col-md-4 col-sm-12" for="type_id">النوع</label>
                            <div class="col-md-5 col-sm-12">
                                <select id="type_id" class="form-control col-md-12 col-sm-12" name="type_id" required
                                        dir="rtl">
                                    @foreach($types as $type)
                                        @if($news->type_id == $type->id)
                                            <option selected value="{{$type->id}}">{{$type->name}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-1 col-md-11 col-sm-12">
                            <label class="col-md-4 col-sm-12">صورة الخبر</label>
                            <div class="col-md-5">
                                <input id="photo" type="file"
                                       class="form-control col-md-12 col-sm-12{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                       name="photo">
                            </div>
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