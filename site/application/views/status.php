<h1 class="rounded">View Single Tweet</h1>

<div class="tweetSingle">
<?php
echo $tweets;
require_once 'fragments/write_tweet.php';
?>
</div>

<h2>More</h2>

<ul>
	<li><span class="icon-twitter2" aria-hidden="true"></span> <a href="https://twitter.com/<?php echo $show->user->screen_name; ?>/status/<?php echo $show->id; ?>" rel="external">This tweet on Twitter</a></li>
	<li><span class="icon-list2" aria-hidden="true"></span> <a href="/user_lists?id=<?php echo $show->user->screen_name; ?>">Lists by <?php echo $show->user->name; ?></a></li>
</ul>

<?php
//echo debug_object( $show );
?>
