@extends('backend.partials.clean')

@section('htmlheader_title')
404 Not Found
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="absolute-center is-responsive">
      <a href="{{ route('frontend.index') }}"> <div id="logo-container"></div></a>
      <div class="col-xs-10 col-xs-offset-1">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backend.login.post') }}">
          {{ csrf_field() }}
          	<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            	<div class="input-group">
          			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          			<div class="input-group">
          				<a href="{{route('frontend.index')}}" align="center">
            				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-left"></i>
            				</span>
            			</a>
            			<a href="{{route('frontend.index')}}">
            				<h2></span>BACK TO BESTWARE</h2>
            			</a>
          			</div>
          <h6> The page you find is not found. Error 404</h6>
          
        </form>
      </div> <!-- .col -->
    </div> <!-- .absolute-center is-responsive -->
  </div> <!-- .row -->
</div> <!-- .container -->
@endsection
