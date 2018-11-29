@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('product.add') }}</h1>
        <div class="row justify-content-center">
            @include('partials.productAdd')
        </div>
    </div>
@endsection
