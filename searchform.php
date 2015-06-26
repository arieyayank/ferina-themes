<form method="get" action="<?php echo home_url('/'); ?>" class="h5-search-form">
	<label for="s"><?php echo __('Search the site', 'Ferina');?> : </label>
	<input type="text" id="s" name="s" value="<?php the_search_query(); ?>">
	<input type="submit" value="<?php echo __('Search', 'Ferina');?>">
</form>