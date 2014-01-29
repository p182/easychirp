<h1 class="rounded">
<?php
echo $xliff_reader->get('lists-h1') . " : ". rawurldecode($list_name) . " : " . $xliff_reader->get('lists-subs');
?>
</h1>

<p class="marginAdjustment"><a href="/list_timeline/<?php echo $list_id; ?>/false">View list timeline</a>. The owner of this list is <a href="/user/<?php echo $list_owner; ?>"><?php echo $list_owner; ?></a>.</p>

<?php
if (count($f->users) == 0): 
	echo '<div class="box1 rounded">';
	echo '<p style="margin-top: 1em;">' . $xliff_reader->get('search-saved-none') . '</p>';
	echo '</div>';
endif;
?>

<?php
foreach ($f->users as $user):
?>
<div class="box1 rounded follow">
	<div class="tweetAvatar" style="background-image:url(<?php echo $user->profile_image_url; ?>)"></div>
	<h2><?php echo anchor('/user/'.$user->screen_name, $user->name); ?> @<?php echo $user->screen_name; ?></h2>
	<p><?php echo $user->location . ". " . $user->description; ?></p>
	<p>
		<?php echo $xliff_reader->get('profile-dt-tweets'); ?> 
		<?php echo anchor('/user_timeline/' . $user->screen_name, $user->statuses_count); ?> 
		<?php echo $xliff_reader->get('profile-dt-following'); ?> 
		<?php echo anchor('/following/' . $user->screen_name, $user->friends_count); ?> 
		<?php echo $xliff_reader->get('profile-dt-followers'); ?> 
		<?php echo anchor('/followers/' . $user->screen_name, $user->followers_count); ?> 
	</p>
</div>
<?php
endforeach;
?>
