@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('icons.icons') }}</h1>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a a href="{{ url('icons/create') }}" class="btn btn-success">
                    {{ __('form.add') }}
                </a>

            </div>
            <table class="table table-condensed table-bordered table-striped">
                @if(!$icons->isEmpty())
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('icons.group') }}</th>
                            <th scope="col">{{ __('icons.name') }}</th>
                            <th scope="col">{{ __('icons.image') }}</th>
                            <th scope="col">{{ __('form.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($icons as $key =>$row)
                            <tr scope="row">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->group }}</td>
                                <td>{{ $row->getOriginal('item') }}</td>
                                <td><img src="{{ asset('images/products/'.$row->url) }}"> {{ $row->url }}</td>
                                <td class="btn-toolbar btn-group">
                                    {{Form::open(['method'  => 'DELETE', 'route' => ['icons.destroy', $row->id]])}}{{  Form::submit(__('form.delete'), ['class'=> 'btn btn-danger']) }}{{ Form::close() }}
                                    <a class="btn btn-success" href="{{ url('/icons/'.$row->id.'/edit') }}">
                                        {{ __('form.edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="col-md-12 alert alert-danger">There is no subscriptions for you :( Click <a href="{{ url('/') }}">here</a> to select products</div>
                @endif
            </table>
        </div>
    </div>
@endsection
