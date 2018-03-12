@extends('layouts.admin')
@section('title', 'Sales')

@section('styles')
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
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Add New Enquiry</h3>
						</div>
						<div class="pull-right">
							<a class="btn btn-sm btn-success" href="{{ route('sales.index') }}">Go Back</a>
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
				            {!! Form::open(['route' => ['sales.store'] ]) !!}
				                @include('sales._form')
				            {!! Form::close() !!}							
						</div>
					</div><!--.row-->
				</div>
			</section>
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