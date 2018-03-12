@extends('layouts.app')

@section('title', 'Types')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $types->total() }} {{ str_plural('Types', $types->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_types')
                <a href="{{ route('types.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                @can('edit_types', 'delete_types')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>{{ $type->min_price }}</td>
                    <td>{{ $type->max_price }}</td>
                    <td>{{ $type->created_at->toFormattedDateString() }}</td>
                    @can('edit_types', 'delete_types')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'types',
                            'id' => $type->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $types->links() }}
        </div>
    </div>

@endsection