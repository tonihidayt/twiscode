<html>
<head>
	<!--this is include js and css-->
	@include('backend.partials.head')

</head>


<body>
	<div class="wrapper">

		<!--this is for header menu-->

		
		<section class="content">
			@yield('main-content')
		</section>
	</div> 
	@include('backend.partials.footer')
</div>

	<!--this is for js-->
	@include('backend.partials.scripts')	
	@stack('scripts')
</body>
</html>