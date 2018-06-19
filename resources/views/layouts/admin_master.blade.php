@include('layouts.partials._admin_header')
	@include('layouts.partials._admin_sidebar')

	@yield('content')

	@include('layouts.partials._admin_footer')	
	@include('layouts.partials._admin_scripts')
</html>