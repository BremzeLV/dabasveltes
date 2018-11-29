@extends('layouts.app')
@section('content')
    <div class="content-padding container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <img class="img-thumbnail" src="{{ $user->avatar }}">
            </div>
            <div class="col-md-7">
                <h1>
                    {{ $user->name }}
                </h1>
                <div style="display:none;">
                    <span class="glyphicon glyphicon-star" ></span>
                    <span class="glyphicon glyphicon-star" ></span>
                    <span class="glyphicon glyphicon-star" ></span>
                    <span class="glyphicon glyphicon-star" ></span>
                    <span class="glyphicon glyphicon-star" ></span>
                </div>

                @if($user->group >= \App\Helpers\UserGroups::GROWER)
                    {{ __('user.email') }}: <a class="email">{{ $user->email }}</a>
                @endif
                <br />
                @if($user->public_phone)
                    {{ __('user.phone_number') }}: <a class="phone">{{ $user->phone }}</a>
                @endif

                {{-- <div class="icon-list address"><span class="glyphicon glyphicon-globe red"></span> Address iela 23</div>
                 <div class="icon-list date"><span class="glyphicon glyphicon-calendar red"></span> 2018/05/23</div>
                 <div class="icon-list time"><span class="glyphicon glyphicon-time red"></span> 7PM</div>--}}
            </div>
        </div>
        <hr />
    </div>
    <div class="container content">
        <div class="row justify-content-center">
            @if( !empty($user->description) )
            <div class="col-lg-12">
                <h3>
                    {{ __('user.description') }}
                </h3>
                <p>
                    {{ $user->description }}
                </p>
            </div>
            @endif
            @if( !empty($products) )
                <div class="col-lg-12">
                    <h3>
                        {{ __('user.products') }}
                    </h3>
                    <div id="products-list" class="row">
                        @foreach($products as $row)
                            <div class="user-product col-md-4  text-center">
                                <a href="#" data-id="{{ $row['id'] }}">
                                    <img class="img-fluid" src="{{ $row['images']['links'][0] }}">
                                    <h5 class="text-center">
                                        {{ $row['title'] }}
                                    </h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if( !empty($products) )
        <div class="container-fluid">
            <div class="row justify-content-center">
                @include('partials.map')
            </div>
        </div>
    @endif
@endsection

<style>
    #user-header {
        padding: 30px 0px 120px 0px;
        font-size: 17px;
        background-size: cover;
    }

    #user-header .transparent-bg {
        padding: 15px 0;
    }

    #user-header h1 {
        font-weight: bold;
        font-size: 60px;
        text-transform: capitalize;
    }

    .white {
        color: #fff;
    }

    .content {
        margin: 40px 0px;
    }

    #products-list h5 {
        margin-top: 15px;
    }
</style>
