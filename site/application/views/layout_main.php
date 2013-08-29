<!doctype html>
<html lang="<?php echo $lang_code; ?>" class="no-js">
<head>
	<?php echo $head_codes; ?>

	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lte IE 7]><script src="include/js/lte-ie7.js"></script><![endif]-->
</head>

<body class="theme-default">

<script>
	document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, '') + ' js ';
</script>

<div id="wrapper">

<div id="skip">
<?php if ($skip_to_sign_in): ?> 
<a href="#sign_in"><?php echo $xliff_reader->get('skip-sign-in'); ?></a> | 
<?php endif; ?> <a href="#main"><?php echo $xliff_reader->get('skip-main-content'); ?></a></div>

<header role="banner">
	<div id="logoContainer"><img src="/images/brand/EasyChirp_Logo2_300.png" alt="Easy Chirp 2" width="300" height="109" /></div>
	<div id="welcome">
		<?php if ($logged_in): ?>
			<h2 class="hide">My Info</h2>
			<p><?php  printf( $xliff_reader->get("nav-welcome-user"), $screen_name); ?> 
			[<a href="/sign_out"><?php echo $xliff_reader->get('nav-sign-out'); ?></a>]</p>
			<p id="hdUserStats"><a href="/following"><?php printf( $xliff_reader->get("nav-following"), $following_count); ?></a> | <a href="/followers"><?php printf( $xliff_reader->get("nav-followers"), $follower_count); ?></a> | <a href="/mytweets"><?php printf( $xliff_reader->get("nav-tweet-count"), $tweet_count); ?></a></p>
		<?php endif; ?>
	</div>
</header>

<nav role="navigation">
	<h2 class="hide"><?php echo $xliff_reader->get('nav-heading-menu'); ?></h2>
	<h3 class="hide"><?php echo $xliff_reader->get('nav-heading-app-menu'); ?></h3>
	<?php echo $main_menu; ?>

	<?php if ($screen_name): ?>
		<h3 class="hide"><?php echo $xliff_reader->get('nav-heading-tweet-menu'); ?></h3>
		<?php echo $tweet_menu; ?>
	<?php endif; ?>
</nav>

<main role="main" id="main" tabindex="-1" 
	data-fav-make="<?php echo $xliff_reader->get('gbl-tweet-make-fav'); ?>" data-fav-remove="<?php echo $xliff_reader->get('gbl-tweet-remove-fav'); ?>"
	data-fav-alert-added="<?php echo $xliff_reader->get('gbl-tweet-fav-alert-added'); ?>" data-fav-alert-removed="<?php echo $xliff_reader->get('gbl-tweet-fav-alert-removed'); ?>"
	data-rt-make="<?php echo $xliff_reader->get('gbl-tweet-make-rt'); ?>" data-rt-remove="<?php echo $xliff_reader->get('gbl-tweet-remove-rt'); ?>"
	data-rt-alert-added="<?php echo $xliff_reader->get('gbl-tweet-rt-alert-added'); ?>" data-rt-alert-removed="<?php echo $xliff_reader->get('gbl-tweet-rt-alert-removed'); ?>"
	data-sure-delete="<?php echo $xliff_reader->get('gbl-sure-delete'); ?>" data-sure-spam="<?php echo $xliff_reader->get('gbl-sure-spam'); ?>"
	data-block="<?php echo $xliff_reader->get('user-block'); ?>" data-unblock="<?php echo $xliff_reader->get('user-unblock'); ?>"
	data-msg-block="<?php echo $xliff_reader->get('gbl-msg-block'); ?>" data-msg-unblock="<?php echo $xliff_reader->get('gbl-msg-unblock'); ?>"
	data-msg-dm-deleted="<?php echo $xliff_reader->get('gbl-msg-dm-deleted'); ?>" 
	data-msg-tweet-deleted="<?php echo $xliff_reader->get('msg-tweet-deleted'); ?>"
>
	<div class="content">
		<?php echo $content; ?>
	</div>	
</main>

<!-- modal windows -->
<div id="go_to_user" class="modal rounded" role="dialog" aria-label="<?php echo $xliff_reader->get('nav-goto-user'); ?>" tabindex="-1">
	<?php require('fragments/go_to_user_form.php'); ?>
	<a href="#" class="close icon-close1"><span class="hide"><?php echo $xliff_reader->get('lists-create-close'); ?></span></a>
</div>
<div id="search_quick" class="modal rounded" role="dialog" aria-label="<?php echo $xliff_reader->get('nav-quick-search'); ?>" tabindex="-1">
	<?php require('fragments/search_quick_form.php'); ?>
	<a href="#" class="close icon-close1"><span class="hide"><?php echo $xliff_reader->get('lists-create-close'); ?></span></a>
</div>
<div id="mask"></div>

<footer role="contentinfo">
	<h2 class="hide"><?php echo $xliff_reader->get('footer-h2'); ?></h2>
	<p><?php echo $xliff_reader->get('footer-select-language'); ?>: English (selected) | <a href="#">Arabic</a> | Espa&ntilde;ol (coming soon) | Fran&ccedil;ais (coming soon)</p>
	<p>&copy; <?php echo $xliff_reader->get('footer-copyright'); ?> 2009-2013 <a href="http://www.dennislembree.com" title="web site professional | www.dennislembree.com">Dennis Lembree</a>, 
	<a href="http://www.weboverhauls.com" title="tune-up your web site! | www.weboverhauls.com">Web Overhauls</a></p>
	<p><img src="/images/powered-by-twitter-sig.gif" width="137" height="11" alt="powered by Twitter" /></p>
</footer>

</div><!--wrapper-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="/include/js/general.js"></script>
<script src="/include/js/ajax.js"></script>
<script>
(function(){
	initCharacterCount();
})();
</script>

<!-- analytics (start) -->
<!--<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36257159-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>-->
<!-- analytics (end) -->

</body>
</html>
