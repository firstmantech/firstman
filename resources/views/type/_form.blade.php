 <div class="form-group @if ($errors->has('service_id')) has-error @endif">
    {!! Form::label('service_id', 'Service Name') !!}
    {!! Form::select('service_id', $service_id, null, ['class' => 'form-control', 'placeholder' => 'Pick a Service']) !!}
    @if ($errors->has('service_id')) <p class="help-block">{{ $errors->first('service_id') }}</p> @endif
  </div>
<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Type Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('min_price')) has-error @endif">
    {!! Form::label('min_price', 'Minimum Price') !!}
    {!! Form::text('min_price', null, ['class' => 'form-control', 'placeholder' => 'Minimum Price']) !!}
    @if ($errors->has('min_price')) <p class="help-block">{{ $errors->first('min_price') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('max_price')) has-error @endif">
    {!! Form::label('max_price', 'Maximum Price') !!}
    {!! Form::text('max_price', null, ['class' => 'form-control', 'placeholder' => 'Maximum Price']) !!}
    @if ($errors->has('max_price')) <p class="help-block">{{ $errors->first('max_price') }}</p> @endif
</div>

<div class="row">
	<div class="col-md-4">
		    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'id' => 'followup',  'tabindex' => 8]) !!}
	</div>
	<div class="col-md-4">
	<a class="btn btn-danger col-md-12" href="{{ url('states') }}">Cancel</a>
	</div>
</div>