<div class="sidebar">
	<?php if (is_active_sidebar('widgets_sidebar')) : dynamic_sidebar('widgets_sidebar'); else : ?>
	
	<div class="widget">
		<h3><?php _e('Search', 'h4'); ?></h3>
		<?php get_search_form(); ?>
	</div>
	
	<div class="widget">
		<h3><?php _e('Ferina Batik Theme', 'ferina'); ?></h3>
		<p><?php _e('Ferina Batik is a theme template designed with HTML 5 that you can use for your site <em>right now</em>. It contains all the template files required to customize your own theme quickly and easily. H5 looks and works great in all modern browsers and is completely valid HTML 5 and CSS.', 'ferina'); ?></p>
	</div>
	
	<div class="widget">
		<h3><?php _e('Categories', 'h4'); ?></h3>
		<ul><?php wp_list_categories('show_count=1&title_li='); ?></ul>
	</div>
	<?php endif; ?>
	
</div>
