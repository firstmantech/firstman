@extends('layouts.admin')
@section('title', 'Users')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatables-net/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/datatables-net.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/pages/chat.min.css') }}">
@endsection
@section('content')

	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>Users</h2>
						</div>
						<div class="pull-right">
							<a class="btn btn-sm btn-success" href="{{ route('users.create') }}">Add New User</a>
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
					<table id="example" class="display table" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Sl No</th>
							<th>Name</th>
							<th>E-Mail</th>
							<th>Department</th>
							<th>Vertical</th>
							<th>Services</th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>Sl No</th>
							<th>Name</th>
							<th>E-Mail</th>
							<th>Department</th>
							<th>Vertical</th>
							<th>Services</th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
						</tfoot>
						<tbody>
							@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ FirstMan::department_name($user->department) }}</td>
							<td>{{ FirstMan::vertical_name($user->vertical) }}</td>
							<td>{{ FirstMan::service_name($user->services) }}</td>
							<td>{{ $user->role }}</td>
							<td>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Modify</a>
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

	<script>
		$(function() {
			$('#example').DataTable({
				select: {
					style: 'multi'
				}
			});
		});
	</script>
	<script type="text/javascript">
		$( '#saleid' ).click(function( event ) {
			alert('test');
		});
	</script>
@endsection