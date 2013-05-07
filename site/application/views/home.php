<h1 class="hide">Easy Chirp 2</h1>

<div class="box1 rounded boxAccent">
	<h2>Web accessibility for the Twitter website application</h2>
	<p>Easy Chirp is a web-accessible alternative to the Twitter.com website. It is designed to be simple to use and is optimized for people who are disabled. It also works with keyboard-only, older browsers like IE7, lowband internet connection, and without JavaScript. Learn more about <a href="http://en.wikipedia.org/wiki/Web_accessibility">web accessibility</a>.</p>
	<p>Refer to the development tasks further down this page for items currently in progress. Learn more about Easy Chirp on the <a href="/about">About</a> and <a href="/features">Features</a> pages. You may also read an extensive list of user feedback and blogs/articles about this application.</p>
</div>

<div class="box1 rounded">
	<h2 id="signin" tabindex="-1">Sign In</h2>
	<div><a href="include/oauth/redirect.php"><img src="/images/sign-in-with-twitter.png" alt="Sign in with Twitter" width="151" height="24" /></a></div>

	<h2>Donate to Easy Chirp</h2>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick" />
		<input type="hidden" name="hosted_button_id" value="2JSYK7TQNL5GA" />
		<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="Donate with PayPal; credit cards accepted." />
		<img alt="" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/scr/pixel.gif" width="1" height="1" />
	</form>
</div>

<div class="box1 rounded">
	<h2>Latest Tweets from Easy Chirp</h2>
	<ul id="homeECtweets">
	<?php $count = 0; ?>
	<?php foreach($easychirp_statuses AS $tweet): ?>
		<?php $count++; ?>
		<?php if ($count > 7){ break; }  ?>
	<?php /*?><?php $tweet_url = 'http://twitter.com/' . $tweet->user->screen_name 
		. '/status/' . $tweet->id_str; ?><?php */?>
		<li>
			<?php echo $tweet->text; ?><?php /*?><br />
			<a href="<?php echo $tweet_url; ?>"><?php echo $tweet->user->name; ?></a> 
			(<?php echo $tweet->user->screen_name; ?>)<?php */?>
		</li>
	<?php endforeach; ?>
	</ul>
	<p>Follow me on Twitter at: <a href="http://twitter.com/EasyChirp" rel="nofollow">@EasyChirp</a>.</p>
</div>

<div class="box1 rounded">
	<h2>Share</h2>
	<div>
		<a href="http://twitter.com/home?status=Try+this+user-friendly+%23Twitter+web+app!+http%3a%2f%2fwww.EasyChirp.com+%40EasyChirp+%23a11y+%23app"><img src="/images/share/twitter.png" width="50" height="50" alt="Twitter" /></a> &nbsp;
		<a href="http://www.facebook.com/sharer.php?u=http://www.EasyChirp.com"><img src="/images/share/facebook.png" width="50" height="50" alt="Facebook" /></a> &nbsp;
		<a href="https://plus.google.com/share?url=http://www.easychirp.com/"><img src="/images/share/googleplus.png" width="50" height="50" alt="Google Plus" /></a> &nbsp;
		<a href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.easychirp.com&amp;title=Check+out+Easy+Chirp!&amp;summary=Easy+Chirp+is+a+user-friendly+Twitter+web+application.+It+is+designed+to+be+easier+to+use+and+is+optimized+for+disabled+users.+It+also+works+with+keyboard-only%2C+older+browsers+like+IE6%2C+lowband+internet+connection%2C+and+without+JavaScript."><img src="/images/share/linkedin.png" width="50" height="50" alt="LinkedIn" /></a> &nbsp;
		<!--<a href="#"><img src="/images/share/pinterest.png" width="50" height="50" alt="Pinterest" /></a> &nbsp;-->
		<a href="http://del.icio.us/post?url=http://www.EasyChirp.com/&amp;title=Easy%20Chirp"><img src="/images/share/delicious.png" width="50" height="50" alt="delicious" /></a> &nbsp; 
		<a href="http://www.stumbleupon.com/submit?url=http://www.EasyChirp.com/"><img src="/images/share/stumbleupon.png" width="50" height="50" alt="stumbleupon" /></a> &nbsp; 
		<!--<a href="http://digg.com/"><img src="/images/share/digg.png" width="50" height="50" alt="digg" /></a> &nbsp;--> 
		<a href="http://www.reddit.com/submit?url=http://www.EasyChirp.com/&amp;t=Easy+Chirp"><img src="/images/share/reddit.png" width="50" height="50" alt="reddit" /></a> &nbsp; 
		<a href="mailto:?subject=Easy Chirp&body=Check out this awesome, user-friendly Twitter web app! http://www.easychirp.com"><img src="/images/share/email.png" width="50" height="50" alt="email" /></a> &nbsp;
	</div>
</div>

<div class="box1 rounded">
	<h2>Article &amp; Blog Mentions</h2>
	<p>Highlights:</p>
	<ul>
		<li><a rel="nofollow" href="http://preparednessforall.wordpress.com/2012/06/04/report-sociability-social-media-for-people-with-a-disability/">Report: Sociability, Social Media for People with a Disability</a> (Preparedness For All)</li>
		<li><a rel="nofollow" href="http://www.lessfussdesign.com/blog/2009/07/accessible-twitter/">Accessible Twitter: how it should have been done to start with</a> (Less Fuss Design)</li>
		<li><a rel="nofollow" href="http://www.nomensa.com/blog/2010/accessible-twitter-advancement-through-technology/">Accessible Twitter: Advancement through technology</a> (Nomensa)</li>
	</ul>
	<p>View more on the <a href="/articles">Articles &amp; Feedback</a> page.</p>
</div>

<div class="box1 rounded">
	<h2>What People Are Tweeting</h2>
	<p class="alert">[UNDER DEVELOPMENT, MOCKUP]</p>
	
	<blockquote>
		<p>I would not B on Twitter 'tall, if not 4 Twitter app: @EasyChirp, makes Twitter simple even rock in space can understand. #SavePlanetPluto</p>
		<div><cite><a rel="nofollow" href="http://twitter.com/plutosgems/status/323641393530695680">from Pluto Major Planet</a> (plutosgems)</cite></div>
	</blockquote>
	<blockquote>
		<p>I would not B on Twitter 'tall, if not 4 Twitter app: @EasyChirp, makes Twitter simple even rock in space can understand. #SavePlanetPluto</p>
		<div><cite><a rel="nofollow" href="http://twitter.com/plutosgems/status/323641393530695680">from Pluto Major Planet</a> (plutosgems)</cite></div>
	</blockquote>
	<blockquote>
		<p>I would not B on Twitter 'tall, if not 4 Twitter app: @EasyChirp, makes Twitter simple even rock in space can understand. #SavePlanetPluto</p>
		<div><cite><a rel="nofollow" href="http://twitter.com/plutosgems/status/323641393530695680">from Pluto Major Planet</a> (plutosgems)</cite></div>
	</blockquote>
</div>

<div class="box1 rounded">
	<h2>Notable Features</h2>
      <ul>
        <li>A built-in shorten URL tool with choice of service.</li>
        <li>Search, user search, and saved searches.</li>
        <li>View, subscribe, and create Twitter Lists.</li>
        <li>Works great with or without JavaScript.</li>
        <li>Fully keyboard accessible.</li>
        <li>Inline threading of tweets; displays reply &quot;conversation&quot;.</li>
        <li>In addition to old and new desktop browsers, I work on virtually any user-agent (even Lynx, a text-only browser), with screen readers and Braille displays, and tablets and mobile devices.</li>
      </ul>
      <p><a href="/features">More Features</a></p>
</div>

<div class="box1 rounded">
	<h2>Awards!</h2>
	<ul class="ulList1">
		<li>Recipient of the American Foundation for the Blind (AFB) 2011 Access Award.</li>
		<li>Recipient of the 2009 Access IT @web2.0 Award.</li>
		<li><abbr title="Royal National Institute of Blind People">RNIB</abbr> Website of the Month, December 2011.</li>
	</ul>
	<p>Read <a href="/about">more about Easy Chirp's awards</a> on the About page.</p>
</div>

<div class="box1 rounded">
	<h2>Development Tasks</h2>

	<h3>Known Issues</h3>
	<p>TBD</p>

	<h3>Current Tasks</h3>
	<p>TBD</p>

	<h3>Wish List</h3>
	<p>TBD</p>
</div>


