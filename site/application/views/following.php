<h1 class="rounded">
<?php
	echo $xliff_reader->get('following-h1') . ' : @' . $screen_name;
?>
</h1>

<?php if (count($f->users) == 0): ?>
	<p><?php echo $xliff_reader->get('following-none'); ?></p>
<?php else: ?>
	<p class="marginAdjustment"><?php echo anchor('/user/' . $screen_name, $screen_name); ?> is following these users. 
	(<?php echo anchor('/followers/' . $screen_name, 'View Followers'); ?>)
<?php endif; ?>

<?php
foreach ($f->users as $user):
?>
<div class="box1 rounded follow">
	<div class="tweetAvatar" style="background-image:url(<?php echo $user->profile_image_url; ?>)"></div>
	<h2> <?php echo anchor('/user/' . $user->screen_name, $user->name); ?>  @<?php echo $user->screen_name; ?></h2>
	<p><?php echo $user->location . ". " . $user->description; ?></p>
	<p>
		<?php echo $xliff_reader->get('profile-dt-tweets'); ?> <?php echo anchor('/user_timeline/' . $user->screen_name, $user->statuses_count); ?>
		<?php echo $xliff_reader->get('profile-dt-following'); ?> <?php echo anchor('/following/' . $user->screen_name, $user->friends_count, 'title="view users that I\'m following"'); ?>  
		<?php echo $xliff_reader->get('profile-dt-followers'); ?> <?php echo anchor('/followers/' . $user->screen_name, $user->followers_count, 'title="view users following me"'); ?>	
	</p>
</div>
<?php
endforeach;
?>
