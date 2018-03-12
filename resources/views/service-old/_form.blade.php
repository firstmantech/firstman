<!-- State Name id -->
 <div class="form-group @if ($errors->has('vertical_id')) has-error @endif">
    {!! Form::label('vertical_id', 'State Name') !!}
    {!! Form::select('vertical_id', $vertical_id, null, ['class' => 'form-control', 'placeholder' => 'Pick a Vertical']) !!}
    @if ($errors->has('vertical_id')) <p class="help-block">{{ $errors->first('vertical_id') }}</p> @endif
  </div>

<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Service Name']) !!}
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
