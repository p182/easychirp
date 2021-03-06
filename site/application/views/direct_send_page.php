<?php
if (isset($action)) {
	if ($action == "sent") {
		echo '<div id="alert-message" tabindex="-1" class="msgBoxPos rounded">'.$xliff_reader->get('gbl-msg-dm-sent').'</div>';
	}
	elseif ($action == "error-not-followed") {
		echo '<div id="alert-message" tabindex="-1" class="msgBoxNeg rounded">'.$xliff_reader->get('gbl-msg-dm-error-not-followed').' ';
		echo anchor('/timeline/' . $screen_name, $xliff_reader->get('gbl-tweet-tweet-message') . ' @' . $screen_name);
		echo '</div>';
	}
	elseif ($action == "error-other") {
		echo '<div id="alert-message" tabindex="-1" class="msgBoxNeg rounded">Error. ' . $_GET["msg"] . '</div>';
	}
	elseif ($action == "deleted") {
		echo '<div id="alert-message" tabindex="-1" class="msgBoxPos rounded">'.$xliff_reader->get('gbl-msg-dm-deleted').'</div>';
	}
}
?>

<h1 class="rounded"><?php echo $xliff_reader->get('dm-h2-send'); ?></h1>

<div class="box1 rounded">
	<form id="frmDirectMessage" action="/direct_send" method="post" class="clear" 
		data-char-remain="<?php echo $xliff_reader->get('write-tweet-char-remain'); ?>"
		data-error-over="<?php echo $xliff_reader->get('error-over-dm'); ?>"
		data-error-empty="<?php echo $xliff_reader->get('error-dm-empty'); ?>"
		data-error-tweep-empty="<?php echo $xliff_reader->get('error-tweep-empty'); ?>">
		<h3 id="dm-label-tweep"><label for="tweep"><?php echo $xliff_reader->get('dm-label-tweep'); ?></label></h3>
		<div id="enterTweep">
			<input type="text" size="20" id="tweep" name="tweep" class="input1" required aria-required="true" value="<?php
			// Output screen_name if defined
			if ($screen_name !== FALSE):
				echo $screen_name;
			endif; ?>" />
		</div>
		<div class="clear"></div>

		<h3 style="padding-top:0"><label for="txtDirectMessage"><?php echo $xliff_reader->get('dm-label-txtDirectMessage'); ?></label></h3>
		<div class="clearfix">
			<textarea id="txtDirectMessage" name="message" rows="2" cols="40" required aria-required="true"></textarea>
			<button class="btnPost" type="submit"><?php echo $xliff_reader->get('dm-send'); ?></button>
		</div>
	</form>

	<p class="smallText notes"><?php echo $xliff_reader->get('dm-note1'); ?></p>
	<p class="smallText notes"><?php echo $xliff_reader->get('dm-note2'); ?></p>
</div>

<div class="box1 rounded">
	<h2><?php echo $xliff_reader->get('gbl-select-page'); ?></h2>
	<ul>
		<li><a href="/direct_inbox"><?php echo $xliff_reader->get('dm-inbox'); ?></a></li>
		<li><a href="/direct_sent"><?php echo $xliff_reader->get('dm-sent'); ?></a></li>
	</ul>
</div>

<?php

// If user is defined, set focus to alert message if exists OR else the textarea
if ($screen_name != FALSE) {
	echo '<script>
	if (document.getElementById("alert-message")) {
		document.getElementById("alert-message").focus();
	}
	else {
		document.getElementById("txtDirectMessage").focus();
	}
	</script>';
}
