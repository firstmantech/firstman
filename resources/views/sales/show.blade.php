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

			<div class="box-typical chat-container">
				<section class="chat-list">
					<div class="chat-list-search">
						<input type="text" class="form-control form-control-rounded" placeholder="Search"/>
					</div><!--.chat-list-search-->
					<div class="chat-list-in scrollable-block">
						@foreach($sales as $saless)
						<div id="saleid">
						<div class="chat-list-item">
							<div class="chat-list-item-header">
								<div class="chat-list-item-name">
									<span class="name">Enquiry # - {{ $saless->id }} <br> Name - {{ $saless->name }}</span>
								</div>
							</div>
							<div class="chat-list-item-cont">
								<div class="chat-list-item-txt writing">
									{{ FirstMan::source_name($saless->source_id) }}
								</div>
							</div>
						</div>
						</div>
						@endforeach
					</div><!--.chat-list-in-->
				</section><!--.chat-list-->

				<section class="chat-area">
					<div class="chat-area-in">
						<div class="chat-area-header">
							<div class="chat-list-item">
								<div class="chat-list-item-photo">
									<img src="img/photo-64-1.jpg" alt="">
								</div>
								<div class="chat-list-item-name">
									<span class="name">Enquiry # - {{ $sale->id }}</span>
								</div>
								<div class="chat-list-item-txt writing">Created at - {{ $sale->created_at->diffForHumans() }}</div>
							</div>
							<div class="chat-area-header-action">
								<a class="btn btn-sm btn-success" href="{{ route('sales.index') }}">Go Back</a>
								<!-- <div class="dropdown dropdown-typical">
									<a class="dropdown-toggle dropdown-toggle-txt" id="dd-chat-action" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="lbl">Actions</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-chat-action">
										<a class="dropdown-item no-nowrap" href="#">Delete&nbsp;conversation</a>
										<a class="dropdown-item no-nowrap" href="#">Report spam</a>
									</div>
								</div> -->
							</div>
						</div><!--.chat-area-header-->
						
						
						<div class="chat-dialog-area scrollable-block">
							@forelse($notifications as $notification)
							<div class="chat-message">
								<div class="chat-message-header">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-name">{{ $notification->status }}</div>
										<div class="tbl-cell tbl-cell-date">{{ $notification->next_follow_date }}-{{ $notification->next_follow_time }}</div>
									</div>
								</div>
								<div class="chat-message-content">
									<div class="chat-message-txt">{{ $notification->comments }}</div>
								</div>
							</div>
						@empty
						<div class="chat-dialog-area scrollable-block">
							<div class="chat-message">
								<div class="chat-message-header">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-name">No History found</div>
									</div>
								</div>
							</div>
						</div>
						@endforelse
						</div>
						<div class="chat-area-bottom">
							<!-- <form class="write-message">
								<div class="avatar">
									<img src="img/photo-64-3.jpg" alt="">
								</div>
								<div class="form-group">
									<textarea rows="2" class="form-control" placeholder="Type a message"></textarea>
								</div>
								<button type="submit" class="btn btn-rounded float-left">Send</button>
								<button type="reset" class="btn btn-rounded btn-default float-left">Clear</button>
							</form> -->
						</div><!--.chat-area-bottom-->
					</div><!--.chat-area-in-->
				</section><!--.chat-area-->
			</div><!--.chat-container-->

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