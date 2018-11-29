<div class="col-sm-12 cancel-padding">
    {!! Form::open(['url' => 'product','method' => 'get', 'class'=>'col-sm-12 mb-sm-2']) !!}
        {{ Form::token()  }}
        <div class="row">
            <div class="form-group">
                {{ Form::label('type[]', __('form.search_by', ['selector' => 'tipa']), ['class' => 'col-sm-12', 'placeholder' => __('form.nothing_selected')]) }}
                {{ Form::select('type[]', App\Icons::forSelect(), $multiselect['type'] ?? null, ['class' => 'col-sm-12', 'multiple'=>true]) }}
            </div>
        </div>

        {{ Form::submit(__('form.search'), ['class'=> 'btn btn-default']) }}

    {!! Form::close() !!}
</div>

@if(!$products->isEmpty())
<table class="table table-condensed table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('product.type') }}</th>
            <th scope="col">{{ __('product.ripe_time') }}</th>
            <th scope="col">{{ __('product.price') }}</th>
            <th scope="col">{{ __('product.pickup_address') }}</th>
            <th scope="col">{{ __('product.see_more') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key =>$row)
            <tr scope="row">
                <td>{{ $key+1 }}</td>
                <td><img src="{{ $row->images['icon'] }}"/> {{ $row->type }}</td>
                <td>{{ date('Y-m-d', strtotime($row->ripe_time)) }}<br/><small>{{ $row->ripe_type }}</small></td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->address }}</td>
                <td>
                    <a href="{{ url('product/'. $row->id) }}">{{ __('product.see_more') }}</a> <br />
                    @if($row->user_id === \Illuminate\Support\Facades\Auth::id())
                        <a href="{{ url('product/'. $row->id. '/edit') }}">{{ __('form.edit') }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <div class="col-md-12 alert alert-danger">{{ __('product.no_items') }}</div>
@endif
