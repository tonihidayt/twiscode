@extends('backend.admin')


@section('main-content')
	
<form class="form-horizontal" role="form" method="POST" action="{{ route('backend.products.update', $products->products_id) }}" onSubmit="return $.checkForm();" autocomplete="off" enctype="multipart/form-data"> {{ csrf_field() }}

	<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> Add Products </h3>
		</div>
		<div class="col-xs-3">
			<span class="pull-right"><a href="{{ route('backend.products.create') }}" class="btn btn-xs btn-default"><img src="{{url('/adminlte/dist/img/add.png')}}"> Add New Product</a></span>
		</div>
	</div>
	</div>

	<div class="form-group{{ $errors->has('products_id') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Products Id</label>
		<div class="col-sm-8 col-lg-3">
			<input class="form-control" id="products_id" name="products_id" type="text" value="{{ old('products_id', $products->products_id) }}" disabled>
			{!! ($errors->first('products_id')) ? showErrorBlock($errors->first('products_id')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Name </label>
		<div class="col-sm-4 col-lg-3">
			<input class="form-control" id="name" name="name" type="text" value="{{ old('name', $products->name) }}">
			{!! ($errors->first('name')) ? showErrorBlock($errors->first('name')) : '' !!}
		</div>
	</div>

	<div class="form-group @if ($errors->has('category_id')) has-error @endif">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Category Id</label>
		<div class="col-sm-3" id="category_id">
			{{ Form::select('category_id', $category , old('category_id', $products->category_id), array('data-style' =>'btn-white', 'class' =>'selectpicker show-tick form-control')) }}
			{!! ($errors->first('category_id')) ? showErrorBlock($errors->first('category_id')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label">Weight</label>
		<div class="col-sm-8 col-lg-3">
			<input class="form-control" id="weight" name="weight" type="text" value="{{ old('weight', $products->weight) }}">
			{!! ($errors->first('weight')) ? showErrorBlock($errors->first('weight')) : '' !!}
		</div>
	</div> 

	<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Price </label>
		<div class="col-sm-4 col-lg-3">
			<input class="form-control" id="price" name="price" type="text" value="{{ old('price', $products->price) }}">
			{!! ($errors->first('price')) ? showErrorBlock($errors->first('price')) : '' !!}
		</div>
	</div>

	<div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
		<label class="col-sm-6 col-lg-2 control-label"><span class=" text-danger"><b>˚</b></span>Detail</label>
		<div class="col-sm-8 col-lg-3">
			<textarea class="form-control" id="details" name="details" rows="4">
				{{ $products['details'] }}
			</textarea>
		</div>
	</div>

	<div class="form-group{{ $errors->has('image_1') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">
			Photo 1
		</label>
		<div class="col-sm-8 col-lg-3">
		    
		    @if (!empty($products->image_1))
				<div class="form-image-holder"><img src="{{url('storage/products/', $products->image_1)}}" height="80px"></div>
				@endif
			<input type="file" id="image_1" name="image_1" value="{{old('image_1', $products->image_1)}}">{{old('image_1', $products->image_1)}}
		</div>
	</div>


	<div class="form-group{{ $errors->has('image_2') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">
			Photo 2
		</label>
		<div class="col-sm-8 col-lg-3">
			<input type="file" id="image_2" name="image_2" value="{{old('image_2', $products->image_2)}}">
		</div>
	</div>

	<div class="form-group{{ $errors->has('image_3') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">
			Photo 3
		</label>
		<div class="col-sm-8 col-lg-3">
			<input type="file" id="image_3" name="image_3" value="{{old('image_3', $products->image_3)}}">

		</div>
	</div>
	<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
		<label class="col-sm-4 col-lg-2 control-label">Status</label>
		<div class="col-sm-8 col-lg-10">
			<input class="bootstrap-switch statusCheckbox" id="status" name="status" type="checkbox" value="{{ old('status', $products->status) }}">
				{!! ($errors->first('status')) ? showErrorBlock($errors->first('status')) : '' !!}
		</div>
	</div>



	<div class="form-group">
		<div class="col-sm-6 col-sm-offset-4 col-lg-8 col-lg-offset-2">
			<button type="submit" class="btn btn-primary">
			<i class="fa fa-btn fa-save"></i> Add
			</button>
			&nbsp;<a href="{{ route('backend.products.list') }}" class="btn btn-default">
			<i class="fa fa-btn fa-hand-o-left"></i> Cancel</a>
		</div>
	</div>
	
	<span class=" text-danger"><b>˚</b>Required</span>

</form>

@endsection

@push('styles')
<link href="{{ asset('/vendor/password-strength-meter/password.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
@include('backend.products.partials.scripts')
@endpush
