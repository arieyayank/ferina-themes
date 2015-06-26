<?php get_header(); ?>
		<div class="theclear breadcrumb">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			} ?> 
		</div>
		<div class="section">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="meta-left">
					<div class="cat-black">
						<?php the_category(', '); ?>
					</div>
					<p><?php the_time('F jS, Y'); ?> <?php echo __('Posted By', 'ferina'); ?> <?php the_author(); ?></p>
				</div>
				<div class="post-content">
					<header>
						<h1>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h1> 
					</header>
					<div class="wrap-post-image">
						<img alt="<?php the_title();?>" src="<?php echo catch_that_image();?>">
					</div>
					<div class="content-text">
						<?php the_excerpt(); ?>
						
					</div>
					<footer>
						<div class="addthis_toolbox addthis_default_style addthis_18x18_style">
							<a class="addthis_button_facebook"></a>
							<a class="addthis_button_twitter"></a>
							<a class="addthis_button_pinterest_share"></a>
							<a class="addthis_button_gmail"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-503a6a9c07773660"></script>
					</footer>
				</div>
			</article>
			<?php endwhile; ?>
			
			<nav class="page-nav">
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<?php warna_numeric_posts_nav(); ?>
			<?php endif; ?> 
			
			</nav>
			<?php else : ?>
			
			<article>
				<h1><?php echo __('Page Not Found', 'ferina'); ?></h1>
				<p><?php echo __('Sorry, but the requested resource was not found on this site.', 'ferina'); ?></p>
				<?php get_search_form(); ?>
			</article>
			<?php endif; ?>
			
		</div>
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>