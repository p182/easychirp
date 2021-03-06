<?php
if (isset($_GET["action"])) {
	if ($_GET["action"]=="modified_text") {
		echo '<div class="msgBoxPos rounded">Your profile has been modified.</div>';
	}
	elseif ($_GET["action"]=="modified_avatar") {
		echo '<div class="msgBoxPos rounded">Your avatar has been modified.</div>';
	}
}
?>

<h1 class="rounded"><?php echo $xliff_reader->get('edit-profile-h1'); ?></h1>

<p id="top-pull-link"><a href="profile"><?php echo $xliff_reader->get('edit-profile-back-to'); ?></a></p>

<div class="box1 rounded" style="margin-top: 1.65rem">
	<h2><?php echo $xliff_reader->get('user-h2-details'); ?></h2>
	<form id="frmProfileEdit" action="/profile_edit_action" method="post">
		<dl id="profile" class="editProfile">
			<dt style="padding-top: 0;"><?php echo $xliff_reader->get('profile-dt-username'); ?></dt>
			<dd><?php echo $profile->screen_name; ?></dd>
			
			<dt><label for="name"><?php echo $xliff_reader->get('profile-dt-name'); ?> <span class="smallText">(required)</span></label></dt>
			<dd><input class="input1" type="text" id="name" name="name" maxlength="20" size="30" value="<?php echo $profile->name; ?>" /></dd>
			
			<dt><label for="location"><?php echo $xliff_reader->get('profile-dt-location'); ?></label></dt>
			<dd><input class="input1" type="text" id="location" name="location" maxlength="30" size="40" value="<?php echo $profile->location; ?>" /></dd>
			
			<dt><label for="description"><?php echo $xliff_reader->get('profile-dt-bio'); ?></label></dt>
			<dd><textarea class="input1" id="description" name="description" 
				maxlength="160" cols="70" rows="3" aria-describedby="descHelp"><?php echo $profile->description; ?></textarea>
				<br /><span id="descHelp">Maximum 160 characters.</span></dd>

			<dt><label for="url"><?php echo $xliff_reader->get('profile-dt-website'); ?></label></dt>
			<dd><input class="input1" type="text" id="url" name="url" maxlength="100" size="50" value="<?php echo $profile->entities->url->urls[0]->expanded_url; ?>" /></dd>
		</dl>
		<div id="editProfileUpdateBtn" class="clear">
			<button type="submit" style="margin-left: .5rem;"><?php echo $xliff_reader->get('edit-profile-update'); ?></button>
		</div>
	</form>
</div>

<div class="box1 rounded">
	<h2><img src="<?php echo $profile->profile_image_url; ?>" alt="" /> <?php echo $xliff_reader->get('edit-profile-avatar-h2'); ?></h2>
	<p><?php echo $xliff_reader->get('edit-profile-avatar-p'); ?></p>
	<form id="frmSettingsAvatar" action="/profile_avatar_action" method="post" enctype="multipart/form-data">
		<div>
			<label for="avatar"><?php echo $xliff_reader->get('edit-profile-avatar-path'); ?></label>: 
			<input class="input1" type="file" id="avatar" name="avatar" />
		</div>
		<div style="padding-top: .5rem;">
			<button type="submit"><?php echo $xliff_reader->get('edit-profile-update'); ?></button>
		</div>
	</form>
</div>
