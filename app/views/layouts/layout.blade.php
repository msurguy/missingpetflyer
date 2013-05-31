<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Missing pet flyer generator</title>
        <meta name="author" content="Maks Surguy">
        <meta name="description" content="Print out a poster for your lost pet, missing dog or cat template poster">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{ url('css/petflyer.css')}}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ url('bootstrap/bootstrap-2.3.1.css?v=0.2')}}">
        <link rel="stylesheet" href="{{ url('bootstrap/bootstrap-responsive-2.3.1.min.css')}}">
        <link rel="stylesheet" href="{{ url('css/main.css')}}">
        @yield('styles')
        <!--[if lt IE 9]>
            <script src="{{ url('js/vendor/html5-3.6-respond-1.1.0.min.js')}}"></script>
        <![endif]-->
    </head>
    <body>
    	<div id="fb-root"></div>
    	<script>(function(d, s, id) {
    	  var js, fjs = d.getElementsByTagName(s)[0];
    	  if (d.getElementById(id)) return;
    	  js = d.createElement(s); js.id = id;
    	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=259410807538564";
    	  fjs.parentNode.insertBefore(js, fjs);
    	}(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div id="wrap">

        <div class="container">
            @yield('content')
        </div> <!-- /container -->

        	<div id="push"></div>
        </div>
        <div id="footer">
        	<div class="container">
			    <div class="row">
			      <div class="span12">
			      	<div class="pull-right">

			      		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://missingpetflyer.com" data-text="Missing pet poster/flyer maker" data-via="msurguy" data-count="none" data-hashtags="missingpet" data-dnt="true">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<div class="fb-like" data-href="http://missingpetflyer.com/" data-send="false" data-width="300" data-show-faces="false" data-font="arial"></div>
					</div>
			        <p>Created by <a href="http://twitter.com/msurguy" target="_blank">@msurguy</a>. <i class="icon-attention"></i> No information that you enter is saved or stored on this site.</p>
			      </div>
			    </div>
			</div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="{{ url('js/vendor/bootstrap.min.js')}}"></script>

        <script src="{{ url('js/main.js')}}"></script>
        @yield('scripts')
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-41200330-1', 'missingpetflyer.com');
          ga('send', 'pageview');

        </script>

    </body>
</html>
