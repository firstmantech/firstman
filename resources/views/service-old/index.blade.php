@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $services->total() }} {{ str_plural('Services', $services->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_states')
                <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Minimum Price</th>
                <th>Maximum Price</th>
                <th>Created At</th>
                @can('edit_services', 'delete_services')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->min_price }}</td>
                    <td>{{ $service->max_price }}</td>
                    <td>{{ $service->created_at->toFormattedDateString() }}</td>
                    @can('edit_states', 'delete_states')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'services',
                            'id' => $service->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $services->links() }}
        </div>
    </div>

@endsection