<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
  @yield('htmlheader_title', 'Your title here') {{ env('HOMEPAGE_TITLE', '') }}
</title>
<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Space+Mono" rel='stylesheet' type='text/css'>
<!-- Styles -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style>
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 40px;
  background: #2377af url('{{ url('assets/images/map2.png') }}') no-repeat right bottom;
  background-size: cover;
  color: #585858;
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-family: 'Space Mono', monospace;
}

.absolute-center.is-responsive {
  margin: 22% auto;
  min-width: 340px;
  padding: 10px 0;
  background-color: #FFF;
  border-radius: 8px;
  display: table;
  border: 3px solid #0072bc;
}

#logo-container{
  margin: auto;
  margin-bottom: 10px;
  height: 80px;
  background: url('{{ url('assets/images/logo.png') }}') no-repeat top center;
  background-size: contain;
}

.input-group-addon {
  background-color: #0072bc;
  border: 1px solid #B2DBFF;
  color: #fff;
}

.form-control {
  border: 1px solid #B2DBFF;
}
.checkbox {
  color: #3A4D5D;
}

.has-error .input-group-addon {
    color: #FF0000;
    background-color: #f2dede;
    border-color: #FF0000;
}

.has-error .form-control {
    border-color: #FF0000;
}

.help-block {
    color: #FF0000 !important;
    padding-left: 52px;
}

.headline {
    font-size: 100px;
    font-weight: 700;
}
.text-red {
    color: #F00;
}
.text-yellow {
    color: #FF8300;
}
.text-primary {
    color: #337ab7;
    text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.18);
}
.error-page {
    text-align:center;
    padding: 10px 20px;
}
.error-icon-title {
    font-size: 80px;
    color: #337ab7;
    height: 50px;
    text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.18);
}
</style>
</head>
<body id="app-layout">
  @yield('content')
  </div>
  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
