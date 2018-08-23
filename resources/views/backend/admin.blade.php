<html>
<head>
	<!--this is include js and css-->
	@include('backend.partials.head')

</head>


<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">

		<!--this is for header menu-->
		@include('backend.partials.header')

		<!--this is for sidebar menu-->
		@include('backend.partials.sidebar')

		<div class="content-wrapper">
		<!--this is for content header-->
		@include('backend.partials.content-header')
		
		<section class="content">
			@yield('main-content')
		</section>
	</div> 
	@include('backend.partials.footer')
</div>

	<!--this is for js-->
	@include('backend.partials.scripts')
	@include('backend.partials.js')
	@stack('scripts')
	
@include('includes.flash')
@include('sweet::alert') 
@include('includes.partials.messages')
</body>
</html>