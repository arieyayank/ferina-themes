<div class="theclear">
	<h1 class="page-title"><?php echo __('Grossir Product','Ferina');?></h1>
</div>
<div class="wrap-pages">
	<div class="banner-page">
	<?php if(of_get_option('baner_home')):?>
		<img src="<?php echo of_get_option('baner_home');?>" alt="Ferina Batik">
	<?php else :?>
		<img alt="Ferina" src="<?php bloginfo('template_url');?>/lib/img/bannerpage1.jpg">
	<?php endif ;?>
	</div>
	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'post_type' => 'produk_grossir', 'posts_per_page' => 6, 'paged' => $paged  );
		$wp_query = new WP_Query($args); ?>
		<!-- the loop -->
		<?php if ( $wp_query->have_posts() ) : ?>
		
		<div class="product-nav"> 
			<div class="row-orderby">
				<?php echo __('Sort','Ferina');?> : 
				<span>
					<select id="orderby" class="select-short">
						<option name="new_product" id="new_product" value="New"><?php echo __('New','Ferina');?></option>
						<option name="new_product" id="new_product" value="Old"><?php echo __('Old','Ferina');?></option>
					</select>
				</span> 
			</div>
			
			<div class="row-pagination">
				<?php if ($wp_query->max_num_pages > 1) : ?>
					<?php warna_numeric_posts_nav(); ?>
				<?php endif; ?> 
			</div>
		</div> 
		<!--Navigation End -->
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div class="mkotak-product produk-archive">
				<div class="kotak-inner">
					<div class="product-box"> 
						<?php
							if ( get_the_post_thumbnail($post_id) != '' ) {

							  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
							   the_post_thumbnail();
							  echo '</a>';

							} else {

							 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
							 echo '<img src="';
							 echo catch_that_image();
							 echo '" alt="" />';
							 echo '</a>';

							}
						?> 
					</div>	 
					<h2 class="post-title">
						<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
					</h2>
					<p>
						<?php echo currency(get_post_meta($post->ID, 'mtb_harga_grossir_2_kodi', true)); ?>
					</p>
					<a href="<?php the_permalink();?>" class="buy-batik"></a>
				</div> 
			</div> 
		<?php endwhile ; wp_reset_postdata(); ?> 
		<?php endif;?>
</div>
<?php get_template_part('loops/left', 'sidebar');?>
<div class="content-product" id="Product" class="row">

</div>
