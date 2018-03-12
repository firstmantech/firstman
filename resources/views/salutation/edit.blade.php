@extends('layouts.admin')
@section('title', 'Edit Salutation')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/flatpickr.min.css') }}">
<style type="text/css">
    #followupopen
    {
        display: none;
    }
    #closedopen
    {
        display: none;
    }
</style>
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Add New Salutation</h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-success" href="{{ route('salutations.index') }}">Go Back</a>
                        </div>
                    </div>
                </div>
            </header>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <section class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                        {!! Form::model($salutation, ['method' => 'PUT', 'route' => ['salutations.update',  $salutation->id ] ]) !!}
                            @include('salutation._form')
                        {!! Form::close() !!}                           
                        </div>
                    </div><!--.row-->
                </div>
            </section>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

@endsection

@section('javascript')

    <script src="{{ asset('assets/js/lib/html5-form-validation/jquery.validation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lib/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
    <script src="{{ asset('assets/js/lib/daterangepicker/daterangepicker.js') }}"></script>
 
@endsection