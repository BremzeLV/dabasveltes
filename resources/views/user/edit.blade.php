@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('user.edit_profile') }}</h1>
            <div class="row justify-content-center">
                @if( isset($user) )
                    {!! Form::open(['url' => '/user', 'files' => true, 'class'=>'col-sm-8']) !!}
                        {{ Form::token()  }}
                        {{ Form::hidden('id', $user->id)  }}
                        <div class="form-group row">
                            {{ Form::label('name',  __('user.name'), ['class' => 'col-sm-3 col-form-label required']) }}
                            {{ Form::text('name', $user->name, ['class' => 'col-sm-9 form-control', 'placeholder' => __('user.name')]) }}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('surname', __('user.surname'), ['class' => 'col-sm-3 col-form-label']) }}
                            {{ Form::text('surname', $user->surname, ['class' => 'col-sm-9 form-control', 'placeholder' => __('user.surname')]) }}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', __('user.email'), ['class' => 'col-sm-3 col-form-label required']) }}
                            {{ Form::text('email', $user->email, ['class' => 'col-sm-9 form-control', 'placeholder' => __('user.email')]) }}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('description', __('user.description'), ['class' => 'col-sm-3 col-form-label']) }}
                            {{ Form::textarea('description', $user->description, ['class' => 'col-sm-9 form-control', 'placeholder' => __('user.description')]) }}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('phone', __('user.phone_number'), ['class' => 'col-sm-3 col-form-label']) }}
                            {{ Form::text('phone', $user->phone, ['class' => 'col-sm-6 form-control', 'placeholder' => __('user.phone_number')]) }}
                            {{ Form::select('public_phone',['1' => __('user.public_phone_yes'), '0' => __('user.public_phone_no')], $user->public_phone, ['class' => 'col-md-3']) }}

                            <small class="col-sm-9 offset-3">Vajadzīgs norādīt, ja esi audzētājs. Netiek publiski rādīts, ja to speciāli nenorāda</small>
                        </div>
                        <div class="custom-file-container row" data-upload-id="upload-input">
                            <label>{{ __('form.file_upload') }} <a class="custom-file-container__image-clear" title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file" >
                                {{ Form::file('image', ['accept'=>'image/*', 'id'=>'profile-image'])  }}
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                {{  Form::submit(__('form.save'), ['class'=> 'btn btn-success']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}

                    <br />
                @endif
            </div>
@endsection
