@extends('backend.admin')


@section('main-content')
	
<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.contact.update', $contactUs->contact_id) }}" onSubmit="return $.checkForm();" autocomplete="off"> {{ csrf_field() }}

	<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> Contact Us</h3>
		</div>
		
	</div>
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Bestware's Email</label>
		<div class="col-sm-8 col-lg-3">
			<input class="form-control" id="email" name="email" type="text" value="{{ old('email', $contactUs->email) }}"></textarea>
			{!! ($errors->first('aboutUs_id')) ? showErrorBlock($errors->first('aboutUs_id')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Bestware's Phone Number</label>
		<div class="col-sm-8 col-lg-3">
			<input class="form-control" id="phone" name="phone" type="text" value="{{ old('phone', $contactUs->phone) }}"></textarea>
			{!! ($errors->first('aboutUs_id')) ? showErrorBlock($errors->first('aboutUs_id')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Bestware's Address</label>
		<div class="col-sm-3 col-lg-5">
			<textarea class="form-control" rows="5" id="address" name="address" type="text" >{{ old('address', $contactUs->address) }}</textarea>
			{!! ($errors->first('aboutUs_id')) ? showErrorBlock($errors->first('aboutUs_id')) : '' !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-lg-8 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-save"></i> Edit
			</button>
			&nbsp;<a href="{{ route('backend.dashboard.list') }}" class="btn btn-default">
			<i class="fa fa-btn fa-hand-o-left"></i> Cancel</a>
		</div>
	</div>
	
	<span class=" text-danger"><b>˚</b>Required</span>

</form>

@endsection
