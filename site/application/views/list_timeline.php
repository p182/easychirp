<?php
/**
* Display the tweets for a user list 
*
* @package EasyChirp
* @subpackage Views
* @author EasyChirp Dev Team
*/
?>
<h1 class="rounded"><?php echo $xliff_reader->get('lists-h1')." ".$xliff_reader->get('nav-timeline'); ?>: <?php echo $list_data->name; ?></h1>

<p id="top-pull-link" style="margin-bottom: 1.25rem;"><a href="/lists"><?php echo $xliff_reader->get('lists-h2-my'); ?></a></p>

<?php
echo '<ul>';

	if ($list_data->user->screen_name == $this->session->userdata('screen_name')) {
		echo '<li>' . $xliff_reader->get('lists-you-are-owner') . ' <a href="/list_edit?id='.$list_data->id.'">' . $xliff_reader->get('lists-edit') . '</a></li>';
	}
	else {
		
		if ($subscribed == TRUE)  {
			echo '<li>You are subscribed to this list.</li>';
		}
		echo '<li>The owner of this list is <a href="/user/'.$list_data->user->screen_name.'">'.$list_data->user->name.'</a>.</li>';
		echo '<li><a href="/user_lists/'.$list_data->user->screen_name.'">More lists by '.$list_data->user->name.'</a>.</li>';

		// Add link to subscribe to this list if not subscribed
	}
	echo '<li>View <a href="/list_subscribers/'.$list_data->user->screen_name.'/'.$list_data->id.'/'.$list_data->name.'">list subscribers</a>';
	echo ' or <a href="/list_members/'.$list_data->user->screen_name.'/'.$list_data->id.'/'.$list_data->name.'">list members</a>.</li>';

echo '</ul>';
?>

<div class="tweetSingle">
<?php
echo $tweets;
?>
</div>
