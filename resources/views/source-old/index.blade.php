@extends('layouts.app')

@section('title', 'Sources')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $sources->total() }} {{ str_plural('Sources', $sources->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_sources')
                <a href="{{ route('sources.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                @can('edit_states', 'delete_states')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->description }}</td>
                    <td>{{ $source->created_at->toFormattedDateString() }}</td>
                    @can('edit_sources', 'delete_sources')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'sources',
                            'id' => $source->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $sources->links() }}
        </div>
    </div>

@endsection