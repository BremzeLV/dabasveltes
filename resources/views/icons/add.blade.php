@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('icons.add_icon') }}</h1>
        <div class="row justify-content-center">
            @include('partials.iconsForm')
        </div>
@endsection
