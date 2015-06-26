<?php get_header(); ?>
	<div class="content-product" id="Product" class="row">
		<div class="banner-page">
			<img alt="ferina" src="<?php bloginfo('template_url');?>/asset/img/bannerpage1.jpg">
		</div>
		<?php if ( have_posts() ) : ?>
		<div class="product-nav">
			<div class="row-display">
				<button id="myGrid" class="grid"><img src="<?php bloginfo('template_url');?>/asset/img/boxes.png"></button>
				<button class="list"><img src="<?php bloginfo('template_url');?>/asset/img/grid.png"></button>
			</div>
			<div class="row-pagination">
				<?php if ($wp_query->max_num_pages > 1) : ?>
					<?php warna_numeric_posts_nav(); ?>
				<?php endif; ?>
			</div>
		</div>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="product-boxtumb grid">
				<div class="entry-content">
					<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
								<a class="thumbnail-wrapper" href="<?php the_permalink();?>">
									<img alt="<?php the_title();?>" src="<?php echo catch_that_image();?>">
								</a>
							</div>
							<div class="back">
								<a class="thumbnail-wrapper" href="<?php the_permalink();?>">
									<img alt="<?php the_title();?>" src="<?php echo catch_that_image();?>">
								</a>
							</div>
						</div>
					</div>
					<div class="thumbtext">
						<h1 class="product-title">
							<a class="tipshow" href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
						</h1>
						<p><?php echo 'Rp '; if (get_post_meta($post->ID, 'mtb_harga_satuan', true)):echo get_post_meta($post->ID, 'mtb_harga_satuan', true); else : echo '99.900'; endif;?></p>
						<button class="buy-batik" type="submit"><?php _e('Buy', 'ferina'); ?></button>
					</div>
				</div>
			</div>
		</article>
		<?php endwhile; ?>

		<?php endif; ?>
		<p><?php _e('No product sale yet!', 'ferina'); ?></p>
	</div>
<?php get_footer(); ?>