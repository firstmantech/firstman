@extends('layouts.app')

@section('title', 'Verticals')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $verticals->total() }} {{ str_plural('Verticals', $verticals->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_verticals')
                <a href="{{ route('verticals.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                <th>Created At</th>
                @can('edit_verticals', 'delete_verticals')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($verticals as $vertical)
                <tr>
                    <td>{{ $vertical->id }}</td>
                    <td>{{ $vertical->name }}</td>
                    <td>{{ $vertical->description }}</td>
                    <td>{{ $vertical->created_at->toFormattedDateString() }}</td>
                    @can('edit_verticals', 'delete_verticals')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'verticals',
                            'id' => $vertical->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $verticals->links() }}
        </div>
    </div>

@endsection