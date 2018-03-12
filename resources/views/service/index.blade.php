@extends('layouts.admin')
@section('title', 'Services')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatables-net/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/datatables-net.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap-sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/sweet-alert-animations.min.css') }}">
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h2>Services</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-success" href="{{ route('services.create') }}">Add New Service</a>
                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
    
                    <table id="example" class="display table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Vertical Name</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Minimum Price</th>
                            <th>Maximum Price</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Vertical Name</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Minimum Price</th>
                            <th>Maximum Price</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->vertical_id }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->min_price }}</td>
                            <td>{{ $service->max_price }}</td>
                            <td>{{ $service->created_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('services.edit',$service->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['services.destroy', $service->id],'style'=>'display:inline', 'id' => 'btn-submit']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

@endsection

@section('javascript')

    <script src="{{ asset('assets/js/lib/datatables-net/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>

    <script>
        $(function() {
            $('#example').DataTable({
                select: {
                    style: 'multi'
                }
            });
        });



        $('#btn-submit').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(isConfirm){
                if (isConfirm) form.submit();
            });
        });



    </script>

@endsection