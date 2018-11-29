@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ __('product.show_statistics') }}</h1>
        <div class="row justify-content-center">

            <h2>{{ $subscriptions }} {{ __('product.subscriptions') }}</h2>

            <br />
            <div class="col-md-12 alert alert-danger">
                Šī lapa vel tiek izstrādāta.
            </div>

        </div>
    </div>
@endsection