<!-- State Name id -->
 <div class="form-group @if ($errors->has('state_id')) has-error @endif">
    {!! Form::label('state_id', 'State Name') !!}
    {!! Form::select('state_id', $state_id, null, ['class' => 'form-control', 'placeholder' => 'Pick a State']) !!}
    @if ($errors->has('state_id')) <p class="help-block">{{ $errors->first('state_id') }}</p> @endif
  </div>
  
<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'City Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
</div>

<div class="row">
	<div class="col-md-4">
		    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'id' => 'followup',  'tabindex' => 8]) !!}
	</div>
	<div class="col-md-4">
	<a class="btn btn-danger col-md-12" href="{{ url('states') }}">Cancel</a>
	</div>
</div>