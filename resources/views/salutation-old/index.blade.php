@extends('layouts.app')

@section('title', 'Salutations')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $salutations->total() }} {{ str_plural('Salutations', $salutations->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_salutations')
                <a href="{{ route('salutations.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                @can('edit_salutations', 'delete_salutations')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($salutations as $salutation)
                <tr>
                    <td>{{ $salutation->id }}</td>
                    <td>{{ $salutation->name }}</td>
                    <td>{{ $salutation->description }}</td>
                    <td>{{ $salutation->created_at->toFormattedDateString() }}</td>
                    @can('edit_states', 'delete_states')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'salutations',
                            'id' => $salutation->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $salutations->links() }}
        </div>
    </div>

@endsection