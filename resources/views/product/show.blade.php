@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->title }}</h1>
        <hr />
        @if($product->user_id === \Illuminate\Support\Facades\Auth::id())
            <button class="btn btn-default send-notification"><a href="{{ url('/subscribe/notify/'.$product->id) }}">{{ __('map.send_notification') }}</a></button>
            <button class="btn btn-default"><a href="{{ url('product/'.$product->id.'/statistics') }}">{{ __('product.show_statistics') }}</a></button>
            <br /><br />
        @endif
        <div class="row">
            <div class="col-md-5">
                <img class="product-thumbnail img-thumbnail" width="100%" src="{{ $product->images['links'][0] }}">
            </div>
            <div class="col-md-7">
                <div class="product-list-info">
                    <ul class="list-unstyled">
                        <li><span class="glyphicon glyphicon-globe red"></span>{{ $product->address }}</li>
                        <li><span class="glyphicon glyphicon-calendar red"></span>{{ $product->ripe_time }}</li>
                        <li><span class="glyphicon glyphicon-time red"></span>{{ $product->ripe_type }} {{ lcfirst(__('product.ripe_type')) }}</li>
                        <li><span class="glyphicon glyphicon-euro red"></span>{{ $product->price }} / {{ $product->price_type }}</li>
                        @if($product->user->public_phone === 1)
                            <li><span class="glyphicon glyphicon-phone red"></span>{{ $product->user->phone }}</li>
                        @endif
                        <li><span class="glyphicon glyphicon-envelope red"></span>{{ $product->user->email }}</li>
                        <li><img src="{{ $product->images['icon'] }}" /> {{ $product->type }}</li>
                    </ul>
                </div>

                @if(!\App\Subscription::check($product->id))
                    <a class="btn btn-green" href="{{ url('subscribe/'.$product->id) }}">{{ __('product.subscribe') }}</a>
                @else
                    <a class="btn btn-red" href="{{ url('subscribe/'.$product->id) }}">{{ __('product.unsubscribe') }}</a>
                @endif

                <a class="btn btn-green" href="{{ url('user/'.$product->user->id) }}">{{ __('map.contact_seller') }}</a>
            </div>
        </div>
        <div class="row mb-sm-4">
            <div class="col-md-12">
                {{ $product->description }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 slider"></div>
        </div>
        <h5>{{ __('map.grown_by') }}</h5>
        <div class="row">
            <div class="col-3 profile-link">
                <a href="#">
                    <img class="avatar img-thumbnail rounded-circle" src="{{ $product->user->avatar }}">
                </a>
            </div>
            <div class="col-sm-6 col-5 align-self-center profile-link">
                <a href="#">
                    <span class="name">
                        Everts Zeilins
                    </span>
                </a>
                <br>
                <span class="score">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                </span>
            </div>
            <div class="col-sm-3 text-center align-self-center">
                <button class="profile-link btn btn-red">
                    <a href="#">{{ __('user.show-profile') }}</a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 description">
                asdasdasd
            </div>
        </div>

        <style>
            #productsModal .product-info span:first-of-type {
                padding-right: 5px;
            }

            #productsModal .description p {
                text-indent: 20px;
            }
        </style>
    </div>
@endsection