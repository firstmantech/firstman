@extends('layouts.admin')
@section('title', 'Sales')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatables-net/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/datatables-net.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/pages/chat.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/bootstrap-daterangepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/bootstrap-select/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lib/prism/prism.css') }}">
<style type="text/css">
	#followupopen
	{
		display: none;
	}
	#closedopen
	{
		display: none;
	}
	#salesopen
	{
		display: none;
	}
</style>
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
									<span class="name">Enquiry # - {{ $notification->sale_id }}</span>
								</div>
								<div class="chat-list-item-txt writing">Created at - {{ $notification->created_at->diffForHumans() }}</div>
							</div>
							<div class="chat-area-header-action">
								<a class="btn btn-sm btn-success" href="{{ route('sales.create') }}">Add New Enquiry</a>
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
							@forelse($notes as $note)
							<div class="chat-message">
								<div class="chat-message-header">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-name">{{ FirstMan::user_name($note->user_id) }}</div>
										<div class="tbl-cell tbl-cell-date">{{ $note->next_follow_date }}-{{ $note->next_follow_time }}</div>
									</div>
								</div>
								<div class="chat-message-content">
									<div class="chat-message-txt">{{ $note->comments }}</div>
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
							{!! Form::model($notification, ['method' => 'PUT', 'route' => ['notifications.update',  $notification->id ] ]) !!}
								{{ csrf_field() }}
								<!-- <div class="form-group">
									<textarea rows="2" class="form-control" name="comments" placeholder="Type Comments"></textarea>
								</div> -->
						<div class="row">
							<div class="col-md-4">
								{!! Form::submit('Followup', ['class' => 'btn btn-primary form-control', 'id' => 'followup',  'tabindex' => 8]) !!}
							</div>
							<div class="col-md-4">
								{!! Form::submit('Closed', ['class' => 'btn btn-danger form-control', 'id' => 'closed',  'tabindex' => 9]) !!}    
							</div>
						    <!-- Submit Form Button -->
						    <div class="col-md-4">
						    {!! Form::submit('Sales', ['class' => 'btn btn-success form-control', 'id' => 'sales',  'tabindex' => 10]) !!}
						    </div>
						</div>
								
								<div class="row" id="followupopen">
								<hr>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-4">
											<fieldset class="form-group">
												<label class="form-label semibold" for="exampleInput">Next Followup Date</label>
												{!! Form::text('next_follow_date', null, ['class' => 'flatpickr form-control', 'id' => 'flatpickr']) !!}
											</fieldset>
										</div>
										<div class="col-md-4">
											<fieldset class="form-group">
												<label class="form-label" for="exampleInputEmail1">Next Followup Time</label>
												<div class="input-group clockpicker" data-autoclose="true">
													{!! Form::text('next_follow_time', null, ['class' => 'form-control']) !!}
												</div>
											</fieldset>
										</div>
										<div class="col-md-4">
											<fieldset class="form-group">
												<label class="form-label" for="exampleInputPassword1">Notes</label>
													{!! Form::text('comments', null, ['class' => 'form-control']) !!}
											</fieldset>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<fieldset class="form-group">
												<label class="form-label semibold" for="exampleInput">Assigned to</label>
												{!! Form::select('assign_to', $users, null, ['class' => 'form-control',  'placeholder' => 'Pick a Name']) !!}
											</fieldset>
										</div>
										<div class="col-md-4">
											<fieldset class="form-group">
												<label class="form-label" for="exampleInputEmail1">Assign as</label>
												<div class="input-group clockpicker" data-autoclose="true">
													{!! Form::select('assign_as', ['Temporary' => 'Temporary', 'Permanent' => 'Permanent'], null, ['class' => 'form-control',  'placeholder' => 'Pick a Service']) !!}
												</div>
											</fieldset>
										</div>
										<div class="col-md-4">
											<fieldset class="form-group">
												<br>
												{!! Form::submit('Submit', ['class' => 'btn btn-success form-control', 'id' => 'followup']) !!}
											</fieldset>
										</div>
									</div>
								</div>
							</div><!--.row-->

							<div class="row" id="closedopen">
							<br>	<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<!-- State Name id -->
									<div class="form-group @if ($errors->has('reason_id')) has-error @endif">
										{!! Form::label('reason_id', 'Reason') !!}
										{!! Form::select('reason_id', $reason, null, ['class' => 'form-control', 'placeholder' => 'Pick a Source']) !!}
										@if ($errors->has('reason_id')) <p class="help-block">{{ $errors->first('reason_id') }}</p> @endif
									</div>
								  	<div class="form-group">
								    {!! Form::submit('Close', ['class' => 'btn btn-danger form-control', 'id' => 'followup']) !!}
									</div>
								</div>
								</div>
							</div>

							<div class="row" id="salesopen">
							<br>	
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<div class="form-group @if ($errors->has('service')) has-error @endif">
											{!! Form::label('service', 'Business Service') !!}
											{!! Form::select('service', $service, null, ['class' => 'form-control', 'placeholder' => 'Pick a Service']) !!}
											@if ($errors->has('service')) <p class="help-block">{{ $errors->first('service') }}</p> @endif
										</div>
								</div>
									<div class="col-md-4">
										<!-- State Name id -->
										<div class="form-group @if ($errors->has('price')) has-error @endif">
											{!! Form::label('price', 'Price') !!}
											{!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price']) !!}
											@if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
										</div>
									  	<div class="form-group">
									    {!! Form::submit('Submit', ['class' => 'btn btn-success form-control', 'id' => 'followup']) !!}
										</div>
									</div>
								</div>
							</div>


                        	{!! Form::close() !!}
						</div><!--.chat-area-bottom-->
					</div><!--.chat-area-in-->
				</section><!--.chat-area-->
			</div><!--.chat-container-->

		</div><!--.container-fluid-->
	</div><!--.page-content-->


@endsection

@section('javascript')
	<script src="{{ asset('assets/js/lib/moment/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
	<script src="{{ asset('assets/js/lib/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/prism/prism.js') }}"></script>

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
	<script>
		$(function() {
			/* ==========================================================================
			 Validation
			 ========================================================================== */

			$('#form-signin_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group'
					}
				}
			});

			$('#form-signin_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-error-text-block',
						display: 'block',
						insertion: 'prepend'
					}
				}
			});

			$('#form-signup_v1').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});

			$('#form-signup_v2').validate({
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			});
		});

	$(document).ready(
    function() {
        $("#followup").click(function() {
            $("#followupopen").toggle();
            return false;
        });
    });
	$(document).ready(
    function() {
        $("#closed").click(function() {
            $("#closedopen").toggle();
            return false;
        });
    });
	$(document).ready(
    function() {
        $("#sales").click(function() {
            $("#salesopen").toggle();
            return false;
        });
    });
	</script>
	<script>
		$(function() {
			function cb(start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
			cb(moment().subtract(29, 'days'), moment());

			$('#daterange').daterangepicker({
				"timePicker": true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				"linkedCalendars": false,
				"autoUpdateInput": false,
				"alwaysShowCalendars": true,
				"showWeekNumbers": true,
				"showDropdowns": true,
				"showISOWeekNumbers": true
			});

			$('#daterange2').daterangepicker();

			$('#daterange3').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});

			$('#daterange').on('show.daterangepicker', function(ev, picker) {
				/*$('.daterangepicker select').selectpicker({
					size: 10
				});*/
			});

			/* ==========================================================================
			 Datepicker
			 ========================================================================== */

			$('.flatpickr').flatpickr();
			$("#flatpickr-disable-range").flatpickr({
				disable: [
					{
						from: "2016-08-16",
						to: "2016-08-19"
					},
					"2016-08-24",
					new Date().fp_incr(30) // 30 days from now
				]
			});
		});
	</script>
@endsection