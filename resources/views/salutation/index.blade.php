@extends('layouts.admin')
@section('title', 'Salutations')

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
                            <h2>Salutations</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-success" href="{{ route('salutations.create') }}">Add New Salutations</a>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            @foreach($salutations as $salutation)
                        <tr>
                            <td>{{ $salutation->id }}</td>
                            <td>{{ $salutation->name }}</td>
                            <td>{{ $salutation->description }}</td>
                            <td>{{ $salutation->created_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('salutations.edit',$salutation->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['salutations.destroy', $salutation->id],'style'=>'display:inline', 'id' => 'btn-submit']) !!}
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