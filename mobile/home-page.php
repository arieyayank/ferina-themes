<?php 
/*
*Setting Home page For Mobile
*/
?>
<div class="mobile-wrap">
	<h3>Product <span>Terbaru</span></h3>
	<?php 
		$args = array( 'post_type' => array('produk_retail', 'produk_grossir'), 'posts_per_page' => 2, 'orderby' => 'date', 'order' => 'DESC');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
	?>
	<div class="mkotak-product">
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
				<?php
					if ( get_post_meta($post->ID, 'mtb_harga_satuan_retail', true) == true ) {
						echo '<p>'. currency(get_post_meta($post->ID, 'mtb_harga_satuan_retail', true)) .'</p>';
						?>
						<a href="<?php the_permalink(); ?>" class="buy-batik"><?php echo __('Buy','Ferina');?></a>
						<?php
					}else{
						echo '<p>'. currency(get_post_meta($post->ID, 'mtb_harga_grossir_2_kodi', true)) .'</p>';
						?>
						<a class="buy-batik" href="<?php the_permalink(); ?>" class="buy-batik"><?php echo __('Buy','Ferina');?></a>
						<?php
					}
				?>
			</p> 
		</div> 
	</div> 
	<?php endwhile; wp_reset_postdata();?>
</div>

<div class="banerBig theclear">
	<?php if (of_get_option('baner_homepage')):?>
		<img src="<?php echo of_get_option('baner_homepage');?>">
	<?php else :?>
		<img src="<?php bloginfo('template_url');?>/lib/img/sample-banner1.png">
	<?php endif ;?>
</div>