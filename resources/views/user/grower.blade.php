@extends('layouts.app')

@section('content')
    <div class="content-padding container-fluid">
        <div class="row justify-content-center">
            <a class="btn btn-default" href="{{ url('product/create') }}">{{ __('grower.add_product') }}</a>
            <a class="btn btn-default" href="{{ url('user/products') }}">{{ __('nav.my_products') }}</a>
        </div>
    </div>
@endsection