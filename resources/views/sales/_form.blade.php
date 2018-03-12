<div class="row">	
	<div class="col-md-4">

		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('source_id')) has-error @endif">
		    {!! Form::label('source_id', 'Source Name') !!}
		    {!! Form::select('source_id', $source, null, ['class' => 'form-control col-md-12', 'placeholder' => 'Pick a Source',  'tabindex' => 1]) !!}
		    @if ($errors->has('source_id')) <p class="help-block">{{ $errors->first('source_id') }}</p> @endif
		  </div>

		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('name')) has-error @endif">
		    {!! Form::label('name', 'Name of the Customer') !!}
		    {!! Form::text('name', null, ['class' => 'form-control col-md-12',  'tabindex' => 3]) !!}
		    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
		  </div>

		<!-- Text body Form Input -->
		<div class="form-group @if ($errors->has('primary_phone')) has-error @endif">
		    {!! Form::label('primary_phone', 'Primary Phone') !!}
		    {!! Form::text('primary_phone', null, ['class' => 'form-control col-md-12',  'tabindex' => 5]) !!}
		    @if ($errors->has('primary_phone')) <p class="help-block">{{ $errors->first('primary_phone') }}</p> @endif
		</div>
	</div>

	<div class="col-md-4">
		
		<!-- Text body Form Input -->
		<div class="form-group @if ($errors->has('service_id')) has-error @endif">
		    {!! Form::label('service_id', 'Service Name') !!}
		    {!! Form::select('service_id', $service, null, ['class' => 'form-control',  'placeholder' => 'Pick a Service',  'tabindex' => 2]) !!}
		    @if ($errors->has('service_id')) <p class="help-block">{{ $errors->first('service_id') }}</p> @endif
		</div>

		<!-- Title of Post Form Input -->
		<div class="form-group @if ($errors->has('email')) has-error @endif">
		    {!! Form::label('email', 'E-Mail') !!}
		    {!! Form::text('email', null, ['class' => 'form-control',  'tabindex' => 4]) !!}
		    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
		</div>

		<!-- Title of Post Form Input -->
		<div class="form-group @if ($errors->has('secondary_phone')) has-error @endif">
		    {!! Form::label('secondary_phone', 'Secondary Phone') !!}
		    {!! Form::text('secondary_phone', null, ['class' => 'form-control',  'tabindex' => 6]) !!}
		    @if ($errors->has('secondary_phone')) <p class="help-block">{{ $errors->first('secondary_phone') }}</p> @endif
		</div>
	</div>
	<div class="col-md-4">
	<!-- Title of Post Form Input -->
		<div class="form-group @if ($errors->has('remarks')) has-error @endif">
		    {!! Form::label('remarks', 'Remarks') !!}
		    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => 8,  'tabindex' => 7]) !!}
		    @if ($errors->has('remarks')) <p class="help-block">{{ $errors->first('remarks') }}</p> @endif
		</div>
	</div>
</div>
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
						{!! Form::text('remarks_nf', null, ['class' => 'form-control']) !!}
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
