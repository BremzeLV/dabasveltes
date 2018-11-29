{!! Form::open(['url' => 'product', 'files' => true, 'class'=>'col-sm-8']) !!}
    {{ Form::token()  }}
    {{ Form::hidden('id', $product->id ?? null)  }}
    <div class="form-group row">
        {{ Form::label('title', __('product.title'), ['class' => 'col-md-3 col-form-label required']) }}
        {{ Form::text('title', $product->title ?? null, ['class' => 'col-md-9 form-control', 'placeholder' => __('product.title')]) }}
    </div>
    <div class="form-group row">
        {{ Form::label('price', __('product.price'), ['class' => 'col-md-3 col-form-label  required']) }}
        {{ Form::text('price', $product->price ?? null, ['class' => 'col-sm-6 form-control','placeholder' => __('product.price')]) }}
        {{ Form::select('price_type',['item' => __('product.price_type_item'), 'kg' => __('product.price_type_weight')], $product->price_type ?? null, ['class' => 'col-md-3']) }}
    </div>

    <div class="form-group row">
        {{ Form::label('ripe_time', __('product.ripe_time'), ['class' => 'col-md-3 col-form-label required']) }}
        {{ Form::text('ripe_time', $product->ripe_time ?? null, ['class' => 'col-md-9 form-control datepicker', 'placeholder' => __('form.date')]) }}
    </div>
    <div class="form-group row">
        {{ Form::label('ripe_type', __('product.ripe_type'), ['class' => 'col-md-3 col-form-label required']) }}
        {{ Form::select('ripe_type',['actual'=>__('product.time_type_actual'), 'predicted'=>__('product.time_type_predicted')], isset($product) ? ($product->getOriginal('ripe_type') ?? null) : null) }}
    </div>
    <div class="form-group row">
        {{ Form::label('type', __('form.type'), ['class' => 'col-md-3 col-form-label  required']) }}
        {{ Form::select('type', App\Icons::forSelect(true),  isset($product) ? ($product->getOriginal('type') ?? null) : null) }}
    </div>
    <div class="form-group row">
        {{ Form::label('description', __('product.description'), ['class' => 'col-md-3 col-form-label required']) }}
        {{ Form::textarea('description', $product->description ?? null, ['class' => 'col-md-9 form-control texteditor', 'placeholder' => __('form.description')]) }}
    </div>

    <div class="form-group row">
        {{ Form::label('address', __('product.pickup_address'), ['class' => 'col-md-3 col-form-label required']) }}
        {{ Form::text('address', $product->address ?? null, ['class' => 'geocomplete col-md-9 form-control', 'placeholder' => __('form.address')]) }}
        <div id="address-information" class="hidden">
            {{ Form::hidden('lat', $product->lat ?? null) }}
            {{ Form::hidden('lng', $product->lng ?? null) }}
            {{ Form::hidden('formatted_address', $product->formatted_address ?? null) }}
        </div>
        <div id="address-map" class="col-sm-12" style="width: 100%; height: 250px;"></div>
    </div>

    <div class="custom-file-container" data-upload-id="upload-input">
        <label>{{ __('form.file_upload') }} <a class="custom-file-container__image-clear" title="Clear Image"></a></label>
        <label class="custom-file-container__custom-file" >
            {{ Form::file('images[]', [/*'multiple'=>true,*/ 'class'=>'custom-file-container__custom-file__custom-file-input','accept'=>'image/*', 'id'=>'inputFile'])  }}
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
            <span class="custom-file-container__custom-file__custom-file-control"></span>
        </label>
        <div class="custom-file-container__image-preview"></div>
    </div>

    <div class="form-group col-md-12">
        {{  Form::submit(__('form.save'), ['class'=> 'btn btn-success']) }}

    </div>
{!! Form::close() !!}
