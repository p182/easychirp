
// Ajax for creating/destroying a favorite
$('a[href*="favorite_"]').click(function(e) {
	e.preventDefault();

	var a = $(this);
	var url_replace = this.href;
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.MakeFav      = $("#main").attr("data-fav-make"); //"make favorite";
	txt.RemoveFav    = $("#main").attr("data-fav-remove"); //"remove favorite";
	txt.AlertAdded   = $("#main").attr("data-fav-alert-added"); //"The favorite has been added.";
	txt.AlertRemoved = $("#main").attr("data-fav-alert-removed"); //"The favorite has been removed.";	

	if (url_replace.indexOf("create") != -1) {
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertAdded);
				
				$(a).addClass("favorited");

				url_replace = url_replace.replace(/create/,"destroy");
				$(a).attr("href", url_replace);

				$(a).attr("title", txt.RemoveFav);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
	else {
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertRemoved);
				
				$(a).removeClass("favorited");

				url_replace = url_replace.replace(/destroy/,"create");
				$(a).attr("href", url_replace);

				$(a).attr("title", txt.MakeFav);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
});

// Ajax for creating/destroying a blocked user
$('a[href*="block_"]').click(function(e) {
	e.preventDefault();

	var a = $(this);
	var url_replace = this.href;
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.block        = $("#main").attr("data-block"); //"Block User";
	txt.unblock      = $("#main").attr("data-unblock"); //"Unblock User";
	txt.AlertBlock   = $("#main").attr("data-msg-block"); //"The user has been blocked.";
	txt.AlertUnblock = $("#main").attr("data-msg-unblock"); //"The user has been unblocked.";

	if (url_replace.indexOf("create") != -1) {
		// Create blocking
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertBlock);
				
				$(a).html(txt.unblock);
				$("#span-user-blocked").css("display", "inline");

				url_replace = url_replace.replace(/create/,"destroy");
				$(a).attr("href", url_replace);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
	else {
		// Remove blocking
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertUnblock);
				
				$(a).html(txt.block);
				$("#span-user-blocked").css("display", "none");

				url_replace = url_replace.replace(/destroy/,"create");
				$(a).attr("href", url_replace);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
});

// Ajax for deleting a DM
$('a[href*="direct_delete"]').click(function(e) {

	if (!confirm(txtAlertSureDelete)) {
		 return false;
	}

	e.preventDefault();

	var a = $(this);
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.AlertDeleted = $("#main").attr("data-msg-dm-deleted");

	$.ajax({
		url: url_send,
		success: function(response) {

			$(a).parent().parent().hide('slow', function() {
				this.remove();
				alert(txt.AlertDeleted);
			});

		},
		error: function(xhr) {
			alert('Error. Status = ' + xhr.status);
		}
	})
});

// Ajax for adding a member to a list
$('.frmListAddMember').submit(function(e) {

	e.preventDefault();

	var url_send = "http://easychirp.local/list_add_member/true";
	var data = $(this).serialize();
	var AlertAdded = $("#myLists").attr("data-msg-list-added");

	$.ajax({
		type: "POST",
		url: url_send,
		data: data,
		success: function(response) {
			alert(AlertAdded);
			var ddMemCnt = parseInt( $("#memCnt").html() , 10) + 1;
			$("#memCnt").html(ddMemCnt);
		},
		error: function(xhr) {
			alert('Error. Status = ' + xhr.status);
		}
	});
});

// Ajax for creating a retweet // will do destroying later
$('a[href*="retweet_"]').click(function(e) {
	e.preventDefault();

	var a = $(this);
	var url_replace = this.href;
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.MakeRt       = $("#main").attr("data-rt-make"); //"";
	txt.RemoveRt     = $("#main").attr("data-rt-remove"); //"";
	txt.AlertAdded   = $("#main").attr("data-rt-alert-added"); //"";
	txt.AlertRemoved = $("#main").attr("data-rt-alert-removed"); //"";

	//alert(txt.MakeRt + " " + txt.RemoveRt + " " + txt.AlertAdded + " " + txt.AlertRemoved);
	//return false;

	if (url_replace.indexOf("create") != -1) {
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertAdded);
				
				$(a).addClass("retweeted");

				//url_replace = url_replace.replace(/create/,"destroy");
				//$(a).attr("href", url_replace);
				$(a).removeAttr("href");

				//$(a).attr("title", txt.RemoveRt);
				$(a).attr("title", "retweeted");
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
	// else {
	// 	$.ajax({
	// 		url: url_send,
	// 		success: function(response) {
	// 			alert(txt.AlertRemoved);
				
	// 			$(a).removeClass("favorited");

	// 			url_replace = url_replace.replace(/destroy/,"create");
	// 			$(a).attr("href", url_replace);

	// 			$(a).attr("title", txt.MakeFav);
	// 		},
	// 		error: function(xhr) {
	// 			alert('Error. Status = ' + xhr.status);
	// 		}
	// 	})
	// }
});

// Ajax for following/unfollowing a user
$('a[href*="follow_user"]').click(function(e) {
	e.preventDefault();

	var a = $(this);
	var url_replace = this.href;
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.follow          = $("#userDetails").attr("data-follow");
	txt.unfollow        = $("#userDetails").attr("data-unfollow");
	txt.following       = $("#userDetails").attr("data-following");
	txt.notfollowing    = $("#userDetails").attr("data-not-following");
	txt.AlertFollowed   = $("#userDetails").attr("data-msg-followed");
	txt.AlertUnfollowed = $("#userDetails").attr("data-msg-unfollowed");

	if (url_replace.indexOf("unfollow") == -1) {
		// Follow
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertFollowed);
				
				$(a).html(txt.unfollow);
				$("#spanFollowCurrent").html(txt.following);

				url_replace = url_replace.replace(/follow_user/,"unfollow_user");
				$(a).attr("href", url_replace);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
	else {
		// Unfollow
		$.ajax({
			url: url_send,
			success: function(response) {
				alert(txt.AlertUnfollowed);
				
				$(a).html(txt.follow);
				$("#spanFollowCurrent").html(txt.notfollowing);

				url_replace = url_replace.replace(/unfollow_user/,"follow_user");
				$(a).attr("href", url_replace);
			},
			error: function(xhr) {
				alert('Error. Status = ' + xhr.status);
			}
		})
	}
});

// Ajax for deleting a tweet
$('a[href*="tweet_delete"]').click(function(e) {

	if (!confirm(txtAlertSureDelete)) {
		 return false;
	}

	e.preventDefault();

	var a = $(this);
	var url_send = this.href.replace("false","true");
	var txt = {};
	txt.AlertDeleted = $("#main").attr("data-msg-tweet-deleted");

	$.ajax({
		url: url_send,
		success: function(response) {

			$(a).closest("div.tweet").hide('slow', function() {
				this.remove();
				alert(txt.AlertDeleted);
			});

		},
		error: function(xhr) {
			alert('Error. Status = ' + xhr.status);
		}
	})
});

// Ajax for tweet threads/conversation via reply
function theRespGuts(e) {
	e.preventDefault();
	
	// Set variables in obj
	data = {};
	data.respParent = $(this).parent().parent();
	data.url = this.href;
	data.url = data.url.replace("status","getResponse");

	// Deactivate link clicked
	$("a[rel='response']").unbind('click', theRespGuts);
	$(this).removeAttr("href");
	$(this).removeAttr("rel");
	$(this).removeAttr("title");

	$.ajax({
		url: data.url,
		success: function(response) {
			data.respParent.after(response);
			$("a[rel='response']").bind('click', theRespGuts);
		},
		error: function(xhr) {
			alert('Error. Status = ' + xhr.status);
		}
	});
}
$('a[rel="response"]').bind('click', theRespGuts);

// Ajax for adding a saved search
$('a[href*="search_save"]').click(function(e) {

	e.preventDefault();

	data = {};
	data.anchorParent = $(this).parent();
	data.url_send = this.href.replace("false","true");
	data.AlertAdded = $("#srch-msgs").attr("data-msg-search-saved");

	$.ajax({
		url: data.url_send,
		success: function(response) {

			$(data.anchorParent).html(data.AlertAdded);
			$(data.anchorParent).attr('tabindex','-1');
			$(data.anchorParent).attr('aria-role','alert');
			$(data.anchorParent).focus();

		},
		error: function(xhr) {
			alert('Error. Status = ' + xhr.status);
		}
	})
});


