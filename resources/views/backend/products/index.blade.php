@extends('backend.admin')


@section('main-content')

<div class="box box-primary">
<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> Database Products</h3>
		</div>
		<div class="col-xs-3">
			<span class="pull-right"><a href="{{ route('backend.products.create') }}" class="btn btn-xs btn-default"><img src="{{url('/adminlte/dist/img/add.png')}}"> Add New Products</a></span>
		</div>
	</div>
</div>

<div class="box-body">
	{!! $dataTable->table() !!}
	@foreach($product as $key => $pro)
	@endforeach
</div>
</div>


@endsection


@include('backend.products.partials.conPro')
@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush