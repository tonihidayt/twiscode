@extends('backend.partials.clean')

@section('htmlheader_title')
Login | Bestware
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="absolute-center is-responsive">
      <a href="#"> <div id="logo-container"></div></a>
      <div class="col-xs-10 col-xs-offset-1">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backend.login.post') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input class="form-control" type="text" name='username' value="{{ old('username') }}" placeholder="Username / No HP" tabindex=1 autofocus />
            </div>
            @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
          </div>
          
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input class="form-control" type="password" name='password' value="{{ old('password') }}" placeholder="Password" tabindex=2 />
            </div>
            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
          
          <div class="form-group">
            <div class="col-md-12">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" tabindex=3> Remember Me
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          
        </form>
      </div> <!-- .col -->
    </div> <!-- .absolute-center is-responsive -->
  </div> <!-- .row -->
</div> <!-- .container -->
@endsection
