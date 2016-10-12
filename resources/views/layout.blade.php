<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="">
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="">
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" itemscope itemtype="http://schema.org/LocalBusiness">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="">
        <meta name="author" content="Bluroe Labs">
        @if($settings['google_verification'])
        <meta name="google-site-verification" content="{{ $settings['google_verification'] }}" />
        @endif
        @if($settings['bing_verification'])
        <meta name="msvalidate.01" content="{{ $settings['bing_verification'] }}" />
        @endif
        @if($settings['pinterest_verification'])
        <meta name="p:domain_verify" content="{{ $settings['pinterest_verification'] }}" />
        @endif
        <title>Example | @yield('title')</title>
        <link rel="icon" href="{{ asset('/favicon.png') }}">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/select2.css') }}">

        <script src="{{ asset('/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
        @yield('head')
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="head-bar">
                        <div class="brand">
                            <h1 class="title"><a href="{{ url('/') }}">Ente Thalassery</a></h1>
                        </div>
                        <div class="links">
                            <a href="{{ url('/add-listing') }}">Add Listing</a>
                            <input type="text" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
                @yield('content')
            <div class="row">
                <div class="col-xs-12 footer">
                &copy; Ente Thalassery
                </div>
            </div>
        </div>

    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('/js/vendor/jquery-1.11.2.min.js') }}"><\/script>')</script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="{{ asset('/js/vendor/holder.min.js') }}"></script>

        <script src="{{ asset('/js/vendor/select2.min.js') }}"></script>
	    @if($settings['google_analytics'])
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', '{{ $settings['google_analytics'] }}', 'auto');
		  ga('send', 'pageview');
		</script>
		@endif
    	@yield('scripts')

    </body>
</html>
