@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('auth.verify_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.fresh_email_link') }}
                        </div>
                    @endif

                    {{ __('auth.check_email') }}
                    {{ __('auth.resend_again', ['route' =>  route('verification.resend')]) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
