{!! Form::open(['url' => '/icons', 'files' => true, 'class'=>'col-sm-8']) !!}
    {{ Form::token()  }}
        {{ Form::hidden('id', $icons->id ?? null) }}
    <div class="form-group row">
        {{ Form::label('group', __('icons.group'), ['class' => 'col-sm-3 col-form-label']) }}
        {{ Form::text('group', $icons->group ?? null, ['class' => 'col-sm-9 form-control', 'placeholder' => __('icons.group')]) }}
    </div>
    <div class="form-group row">
        {{ Form::label('item', __('icons.name'), ['class' => 'col-sm-3 col-form-label']) }}
        {{ Form::text('item', $icons->getOriginal('item') ?? null, ['class' => 'col-sm-9 form-control', 'placeholder' => __('icons.name')]) }}
    </div>
    <div class="form-group col-md-12">
        @if(isset($icons->url))
            <img src="{{ asset('images/products/'.$icons->url) }}">
        @endif
        <label class="sr-only" for="inputFile">{{ __('form.file_upload') }}</label>
        {{ Form::file('image', ['multiple'=>true,'accept'=>'image/*', 'id'=>'image'])  }}
    </div>
    <div class="form-group col-md-12">
        {{  Form::submit(__('form.save'), ['class'=> 'btn btn-success']) }}
    </div>
{!! Form::close() !!}