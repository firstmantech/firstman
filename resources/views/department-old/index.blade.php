@extends('layouts.app')

@section('title', 'Departments')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $departments->total() }} {{ str_plural('Department', $departments->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_departments')
                <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                @can('edit_departments', 'delete_departments')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>{{ $department->created_at->toFormattedDateString() }}</td>
                    @can('edit_states', 'delete_states')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'departments',
                            'id' => $department->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $departments->links() }}
        </div>
    </div>

@endsection