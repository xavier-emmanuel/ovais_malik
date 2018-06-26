@include('layouts.partials._header')

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=216062112545276&autoLogAppEvents=1';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	@include('layouts.partials._navbar')

	@yield('content')

	@include('layouts.partials._footer')
	@include('layouts.partials._scripts')
</body>
</html>