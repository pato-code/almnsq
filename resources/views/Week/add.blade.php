@extends('layouts.almnsq')
@section('content')
    <div class="container">
        <div class="card card-container"
             style="margin-top: 200px;margin-bottom: 1%;"
             dir="rtl">
            <div class="card-header">
                أنشطة الأسبوع
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('/week/add')}}" aria-label="{{ __('Login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title"
                               class="col-sm-4 col-form-label text-md-right">عدد المناشط هذا الأسبوع</label>

                        <div class="col-md-6">
                            <input id="number_of_activities" type="number_of_activities"
                                      class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="number_of_activities"
                                      required autofocus />
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                تعديل رقم المناشط
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection