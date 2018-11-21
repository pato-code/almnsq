@extends('layouts.almnsq',["welcome" => true])
@section('silder')
    @include('layouts.template.banner')

@endsection

@section('khotob')
    @include('layouts.template.carousel')
@endsection

@section('complaint')
    @include('layouts.template.requestActivity')
    @include('layouts.template.complement')

@endsection
@section('suggestion')
    @include('layouts.template.suggestion')
@endsection
