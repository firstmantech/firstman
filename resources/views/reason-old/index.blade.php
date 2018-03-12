@extends('layouts.app')

@section('title', 'Reasons')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $reasons->total() }} {{ str_plural('Reason', $reasons->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_reasons')
                <a href="{{ route('reasons.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
            @foreach($reasons as $reason)
                <tr>
                    <td>{{ $reason->id }}</td>
                    <td>{{ $reason->name }}</td>
                    <td>{{ $reason->description }}</td>
                    <td>{{ $reason->created_at->toFormattedDateString() }}</td>
                    @can('edit_reasons', 'delete_reasons')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'reasons',
                            'id' => $reason->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $reasons->links() }}
        </div>
    </div>

@endsection