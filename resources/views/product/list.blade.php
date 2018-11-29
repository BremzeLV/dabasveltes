@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ __('product.list') }}</h1>
        <div class="row justify-content-center">

            @include('partials/productList')

        </div>
    </div>
@endsection