@extends('layouts.admin')

@section('title', 'States')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $cities->total() }} {{ str_plural('City', $cities->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_cities')
                <a href="{{ route('cities.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
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
                @can('edit_cities', 'delete_cities')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->description }}</td>
                    <td>{{ $city->created_at->toFormattedDateString() }}</td>
                    @can('edit_cities', 'delete_cities')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'cities',
                            'id' => $city->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $cities->links() }}
        </div>
    </div>

@endsection