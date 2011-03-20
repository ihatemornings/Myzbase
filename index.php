<?php
	
	require("config.php");
	
	$myzbase_id = isset($_GET["id"]) ? $_GET["id"] : "";
	
	if (!isset($myzbase[$myzbase_id])) header('Location: http://myzbase.tumblr.com');
	
	$myzbase_name = $myzbase[$myzbase_id]["name"];
	$myzbase_description = $myzbase[$myzbase_id]["description"];
	$myzbase_soundcloud_set_url = $myzbase[$myzbase_id]["soundcloud_set_url"];
	$myzbase_songkick_id = $myzbase[$myzbase_id]["songkick_id"];
	$myzbase_photo = $myzbase[$myzbase_id]["photo"];
	$has_photo_credit = isset($myzbase[$myzbase_id]["photo_credit"]);
	if ($has_photo_credit) $myzbase_photo_credit = $myzbase[$myzbase_id]["photo_credit"];
	$myzbase_website_url = $myzbase[$myzbase_id]["website_url"];
	$has_contacts = isset($myzbase[$myzbase_id]["contacts"]);
	if ($has_contacts) $myzbase_contacts = $myzbase[$myzbase_id]["contacts"];
	$myzbase_layout = $myzbase[$myzbase_id]["layout"];
	
?>
<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $myzbase_name; ?> &mdash; Myzbase (like Myspace but good)</title>
  <meta name="description" content="<?php echo $myzbase_description; ?> &ndash; Soundcloud music player, Songkick gig listings and contact details">
  <meta name="author" content="Ben Walker">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="user-scalable=no,width=device-width">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">


	<!-- CSS : implied media="all" -->
	<link rel="stylesheet" href="css/style.css?v=2">
	<link rel="stylesheet" href="css/sc-player-minimal.css?v=2">

  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/libs/modernizr-1.6.min.js"></script>

</head>

<body class="<?php echo $myzbase_layout; ?>">

  <div id="container">
	
	<header>
		
	</header>
	
	<div id="main">
	
		<div id="title-description" class="module">
			
			<h1><?php echo $myzbase_name; ?></h1>
			
			<p><?php echo $myzbase_description; ?></p>
			
		</div>
		
		<div id="photo" class="module">
			<img src="images/<?php echo $myzbase_photo; ?>" alt="<?php echo $myzbase_name; ?> official photo" width="100%" />
		</div>
		
		<div id="player" class="module soundcloud">
			<a href="<?php echo $myzbase_soundcloud_set_url; ?>" class="sc-player"><?php echo $myzbase_name; ?> music player</a>
		</div>
		
		<div id="listing" class="module gigs songkick">
			
			<h2><?php echo $myzbase_name; ?> gigs, shows &amp; events</h2>
			
			<div id="songkick"></div>
			
		</div>
		
		<?php if ($has_contacts) { ?>
		<div id="info" class="module text">
			
			<h2>Contact <?php echo $myzbase_name; ?></h2>
			
			<ul>
				<?php foreach ($myzbase_contacts as $contact) { ?>
				<li><?php echo $contact["type"]; ?>:
					<a href="mailto:<?php echo $contact["email"]; ?>">
						<?php echo $contact["email"]; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
			
		</div>
		<?php } ?>
		
		<div id="credit">
			
			<?php if ($has_photo_credit) { ?>
			<p><?php echo $myzbase_photo_credit; ?></p>
			<?php } ?>
			
			<p>(this is <a href="http://myzbase.tumblr.com">Myzbase</a> by <a href="http://twitter.com/ihatemornings">@ihatemornings</a>)</p>
			
		</div>
		
	</div>
	
	<footer>
		
		<div id="links">
		
			<ul>
				<li>Now please visit the <a href="<?php echo $myzbase_website_url; ?>"><?php echo $myzbase_name; ?> official website</a> &rarr;</li>
			</ul>
			
		</div>
		
	</footer>
	
	
  </div> <!--! end of #container -->


	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>
	
	
	<script src="js/libs/jquery.backstretch.min.js"></script>
	<script src="js/mylibs/gigscraper.js"></script>
	<script type="text/javascript" src="js/libs/soundcloud.player.api.js"></script>
	<script type="text/javascript" src="js/libs/sc-player.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	<script>
		jQuery(function ($) {
			$("#songkick").gigscraper("<?php echo $myzbase_songkick_id ?>", "0trHk7OHF9iyGVwE");
		});
	</script>
	
	
	
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg, #songkick'); //fix any <img> or .png_bg background-images </script>
  <![endif]-->

  <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet 
       change the UA-XXXXX-X to be your site's ID -->
  <script>
   var _gaq = [['_setAccount', 'UA-511718-12'], ['_trackPageview']];
   (function(d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.async = true;
    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
   })(document, 'script');
  </script>
  
</body>
</html>