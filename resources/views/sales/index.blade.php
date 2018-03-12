@extends('layouts.admin')
@section('title', 'Sales')

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
							<h2>My Enquiries</h2>
						</div>
						<div class="pull-right">
							<a class="btn btn-sm btn-success" href="{{ route('sales.create') }}">Add New Enquiry</a>
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
							<th>Enquiry #</th>
							<th>Source</th>
							<th>Name</th>
							<th>Phone</th>
							<th>E-Mail</th>
							<th>Service</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
							<th>Enquiry #</th>
							<th>Source</th>
							<th>Name</th>
							<th>Phone</th>
							<th>E-Mail</th>
							<th>Service</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
						</tfoot>
						<tbody>
							@foreach($sales as $sale)
						<tr>
							<td>{{ $sale->id }}</td>
							<td>{{ FirstMan::source_name($sale->source_id) }}</td>
							<td>{{ $sale->name }}</td>
							<td>{{ $sale->primary_phone }}</td>
							<td>{{ $sale->email }}</td>
							<td>{{ FirstMan::service_name($sale->service_id) }}</td>
							<td>{{ $sale->status }}</td>
							<td>
                                <a class="btn btn-primary btn-sm" href="{{ route('sales.show',$sale->id) }}">View History</a>
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