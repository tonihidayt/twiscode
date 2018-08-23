@extends('backend.admin')


@section('main-content')
	
<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.admins.store') }}" onSubmit="return $.checkForm();" autocomplete="off"> {{ csrf_field() }}

	<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> Edit Admin </h3>
		</div>
		
	</div>
	</div>

	<p>

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>No. Hp</label>
		<div class="col-sm-4 col-lg-3">
			<input class="form-control" id="username" name="username" type="text" value="{{ old('username') }}">
		</div>
	</div>

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Admin Name </label>
		<div class="col-sm-4 col-lg-3">
			<input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
		</div>
	</div>	

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Password</label>
			<div class="col-sm-4 col-lg-3">
				<div class="input-group">
					<input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}">
					<a class="password-eye input-group-addon" style="cursor: pointer;"><span class="glyphicon glyphicon-eye-close"></span></a>
				</div>
			</div>
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Password Confirmation</label>
			<div class="col-sm-8 col-lg-3">
				<input class="form-control" id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}">
			</div>
	</div>

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Email</label> 
			<div class="col-sm-8 col-lg-3">
				<input class="form-control" id="email" name="email" type="text" value="{{ old('email') }}">
			</div>
	</div>

	<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">Status</label>
			<div class="col-sm-8 col-lg-10">
				<input class="bootstrap-switch statusCheckbox" id="status" name="status" type="checkbox" value="{{ old('status') }}">
			</div>
	</div>

	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-lg-8 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-save"></i> Add
			</button>
			&nbsp;<a href="{{ route('backend.admins.list') }}" class="btn btn-default">
			<i class="fa fa-btn fa-hand-o-left"></i> Cancel</a>
		</div>
	</div>
	
	<span class=" text-danger"><b>˚</b>Required</span>

</form>

@endsection

@push('scripts')
@include('backend.admin.partials.scripts')
@endpush