@extends('backend.admin')


@section('main-content')
<div class="box box-primary">
<div class="box-header with-border">
	<div class="row">
		<div class="col-xs-9">
			<h3 class="box-title pull-left"><i class="glyphicon glyphicon-education"></i> Administrator</h3>
		</div>
		<div class="col-xs-3">
			<span class="pull-right"><a href="{{ route('backend.admins.create') }}" class="btn btn-xs btn-default"><img src="{{url('/adminlte/dist/img/add.png')}}"> Add New Administrator</a></span>
		</div>
	</div>
</div>

<div class="box-body">
	{!! $dataTable->table() !!}
	@foreach($admins as $key => $adm)
	@endforeach
</div>
</div>
@endsection


@include('backend.admin.partials.conAdmin')
 
@push('scripts')
{!! $dataTable->scripts() !!}
@endpush


