<div class="row">	
	<div class="col-md-6">

		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('name')) has-error @endif">
		    {!! Form::label('name', 'Name') !!}
		    {!! Form::text('name', null, ['class' => 'form-control col-md-12',  'tabindex' => 1]) !!}
		    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
		  </div>
		<!-- Text body Form Input -->
		<div class="form-group @if ($errors->has('password')) has-error @endif">
		    {!! Form::label('password', 'Password') !!}
		    {!! Form::password('password', ['class' => 'form-control col-md-12',  'tabindex' => 3]) !!}
		    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
		</div>
		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('department')) has-error @endif">
		    {!! Form::label('department', 'Department') !!}
		    {!! Form::select('department', $department, null, ['class' => 'form-control col-md-12',  'tabindex' => 5]) !!}
		    @if ($errors->has('department')) <p class="help-block">{{ $errors->first('department') }}</p> @endif
		  </div>
		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('services')) has-error @endif">
		    {!! Form::label('services', 'Services') !!}
		    {!! Form::select('services', $service, null, ['class' => 'form-control col-md-12',  'tabindex' => 7]) !!}
		    @if ($errors->has('services')) <p class="help-block">{{ $errors->first('services') }}</p> @endif
		  </div>
	</div>

	<div class="col-md-6">
		
		<!-- Text body Form Input -->
		<div class="form-group @if ($errors->has('email')) has-error @endif">
		    {!! Form::label('email', 'E-Mail') !!}
		    {!! Form::text('email', null, ['class' => 'form-control',  'tabindex' => 2]) !!}
		    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
		</div>

		<!-- Title of Post Form Input -->
		<div class="form-group @if ($errors->has('confirm_password')) has-error @endif">
		    {!! Form::label('confirm_password', 'Confirm Password') !!}
		    {!! Form::password('confirm_password', ['class' => 'form-control',  'tabindex' => 4]) !!}
		    @if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
		</div>
		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('vertical')) has-error @endif">
		    {!! Form::label('vertical', 'Vertical') !!}
		    {!! Form::select('vertical', $vertical, null, ['class' => 'form-control col-md-12',  'tabindex' => 6]) !!}
		    @if ($errors->has('vertical')) <p class="help-block">{{ $errors->first('vertical') }}</p> @endif
		  </div>
		<!-- State Name id -->
		 <div class="form-group @if ($errors->has('role')) has-error @endif">
		    {!! Form::label('role', 'Role') !!}
		    {!! Form::text('role', null, ['class' => 'form-control col-md-12',  'tabindex' => 8]) !!}
		    @if ($errors->has('role')) <p class="help-block">{{ $errors->first('role') }}</p> @endif
		  </div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-4">
		{!! Form::submit('Create', ['class' => 'btn btn-primary form-control', 'id' => 'followup',  'tabindex' => 9]) !!}
	</div>
	<div class="col-md-4">
		<a class="btn btn-success col-md-4" href="{{ route('users.index') }}">Go Back</a>   
	</div>
</div>
