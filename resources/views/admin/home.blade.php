@extends('layouts.admin.app')

@section('style')

    <style>
        #statistics { text-align: center }
    </style>

    @endsection

@section('content')

    <div>
        <h2>@lang('site.home')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">@lang('site.home')</li>
    </ul>

    <h1 id = "statistics" > @lang('site.modules_statistics') </h1>

@endsection


