<form id="frmSearch" action="/search_results" method="post">
	<label for="query" class="hide"><?php echo $xliff_reader->get('search-tweets-query'); ?></label>
	<input name="query" id="query" type="text" size="35" maxlength="50" class="input1" aria-required="true" />
	<button type="submit" class="btnSmall"><?php echo $xliff_reader->get('search-tweets-submit'); ?></button>
</form>