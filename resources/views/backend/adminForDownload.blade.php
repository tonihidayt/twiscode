<html>
<head>
	@include('backend.partials.head')
</head>


<body>
	@yield('main-content')
	@include('backend.partials.footer')
</div>
	@include('backend.partials.scripts')	
	@stack('scripts')
</body>
</html>