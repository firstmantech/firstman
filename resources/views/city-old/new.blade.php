@extends('layouts.admin')

@section('title', 'Create')

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h3>Create Cities</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('cities.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => ['cities.store'] ]) !!}
                @include('city._form')
                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection