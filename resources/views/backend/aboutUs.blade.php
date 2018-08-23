@extends('backend.admin')


@section('main-content')

<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.about.update', $aboutUs->about_id) }}" onSubmit="return $.checkForm();" autocomplete="off" enctype="multipart/form-data"> {{ csrf_field() }}

	<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> About Us </h3>
		</div>
		 
	</div>
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>History</label>
		<div class="col-sm-10 col-lg-5">
			<textarea class="form-control" rows="5" id="history" name="history" type="text">{{ old('history', $aboutUs->history) }}</textarea>
			{!! ($errors->first('aboutUs_id')) ? showErrorBlock($errors->first('aboutUs_id')) : '' !!}
		</div>
	</div> 

	<div class="form-group{{ $errors->has('history_img') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">
			History Image
		</label>
		<div class="col-sm-8 col-lg-3">
		    <div class="form-image-holder"><img src="{{url('storage/products/', $aboutUs->history_img)}}" height="50px"></div><br>
			<input type="file" id="history_img" name="history_img">
			{{ old('history_img', $aboutUs->history_img) }}
		</div>
	</div>

	<div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Goals</label>
		<div class="col-sm-8 col-lg-5">
			<textarea class="form-control" id="goals" rows="5" name="goals" type="text">{{ old('goals', $aboutUs->goals) }}</textarea>
			{!! ($errors->first('aboutUs_id')) ? showErrorBlock($errors->first('aboutUs_id')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('goals_img') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">
			Goals image
		</label>
		<div class="col-sm-8 col-lg-8">
		    <div class="form-image-holder"><img src="{{url('storage/products/', $aboutUs->goals_img)}}" height="50px"></div><br>
			<input type="file" id="goals_img" name="goals_img">{{ old('goals_img', $aboutUs->goals_img) }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-lg-8 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-save"></i> Add
			</button>
			&nbsp;<a href="{{ route('backend.about.create') }}" class="btn btn-default">
			<i class="fa fa-btn fa-hand-o-left"></i> Cancel</a>
		</div>
	</div>
	
	<span class=" text-danger"><b>˚</b>Required</span>

</form>

@endsection
