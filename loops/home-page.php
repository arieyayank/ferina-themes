<?php
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		if ($iphone || $android || $palmpre || $ipod || $berry == true) 
:?>
<?php get_template_part('mobile/home', 'page');?>
<?php else :?>

<div class="callbacks_container">
	<ul class="rslides" id="slider4"> 
	<?php
		// $args = array('post_type' => 'slider', 'posts_per_page' => 5);
		// $wp_query = new WP_Query($args);
	?>
		<!-- the loop -->
		<?php //if ( $wp_query->have_posts() ) : while ($wp_query->have_post() ) : $wp_query->the_post(); ?>
		  <!--<li><img src="<?php// echo get_post_meta($post->ID, 'mtb_slider-images', true); ?>" alt="<?php //bloginfo('name');?>" /> </li>-->
			<?php
				$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
				$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
				$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
				$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
				$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
					if ($iphone || $android || $palmpre || $ipod || $berry == true) 
			:?>
		  <li><img src="<?php bloginfo('template_url');?>/asset/img/slider/m1.jpg" alt="<?php bloginfo('name');?>" /> </li>
		  <li><img src="<?php bloginfo('template_url');?>/asset/img/slider/m2.jpg" alt="<?php bloginfo('name');?>" /> </li> 
		<?php else :?>
		  <li><img src="<?php bloginfo('template_url');?>/asset/img/slider/1.jpg" alt="<?php bloginfo('name');?>" /> </li>
		  <li><img src="<?php bloginfo('template_url');?>/asset/img/slider/2.jpg" alt="<?php bloginfo('name');?>" /> </li> 
		<?php endif ;?>
		<?php //endwhile;  else :?>
			<!--<li><img src="<?php// bloginfo('template_url');?>/lib/img/slider/1.jpg" alt="<?php //bloginfo('name');?>" /> </li>
			<li><img src="<?php //bloginfo('template_url');?>/lib/img/slider/2.jpg" alt="<?php// bloginfo('name');?>" /> </li> -->
		<?php //endif ;?>
	</ul> 
	<div class="regro-button">
		<a class="btn-rego" title="retail" href="/produk_grossir"><?php echo __('Grossir Shopping','Ferina');?></a>
		<a class="btn-rego" title="retail" href="/produk_retail"><?php echo __('Retail Shopping','Ferina');?></a>
	</div>
</div>

<div class="product-list-wrapper theclear">
	<h3><?php echo __('Latest <span>Product</span>','Ferina');?></h3>
	<?php 
		$args = array( 'post_type' => array('wholesale-product', 'retail-product'), 'posts_per_page' => 4, 'orderby' => 'date', 'order' => 'DESC');
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
	?>
	<div class="col-thumbs-product">
		<div class="product-box">
			<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
				<div class="flipper">
					<div class="front">
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
				<div class="back">
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
			</div>
		</div>	

		</div>
		<h2 class="post-title">
			<a href="<?php the_permalink();?>"><?php the_title();?></a>
		</h2>
		<?php
			if ( get_post_meta($post->ID, 'mtb_harga_satuan_retail', true) == true ) {
				echo '<p>'. currency(get_post_meta($post->ID, 'mtb_harga_satuan_retail', true)) .'</p>';
				?>
				<a href="<?php the_permalink(); ?>" class="buy-batik"><?php _e('Buy','Ferina');?></a>
				<?php
			}else{
				echo '<p>'. currency(get_post_meta($post->ID, 'mtb_harga_grossir_2_kodi', true)) .'</p>';
				?>
				<a href="<?php the_permalink(); ?>" class="buy-batik"><?php _e('Buy','Ferina');?></a>
				<?php
			}
		?>
	</div> 
	<?php endwhile; wp_reset_postdata();?>
</div>
<div class="banerBig theclear">
	<?php if (get_option('baner_homepage')!= false):?>
		<img src="<?php echo of_get_option('baner_homepage');?>">
	<?php else :?>
		<img src="<?php bloginfo('template_url');?>/asset/img/sample-banner1.png">
	<?php endif ;?>
</div>
<div class="prodesc-tabs theclear">
	<div id="tabs" class="tabsregro">
		<ul class='tabs'>
			<li><a href='#tab1'><?php echo __('Grossir','Ferina');?></a></li>
			<li><a href='#tab2'><?php echo __('Retail','Ferina');?></a></li> 
		</ul>
		<div class="tabs-content">
			<div id='tab1'>
			<?php if(get_option('grossir_desc') != false):?>
				<p><?php echo get_option('grossir_desc');?></p>
			<?php else :?>
				<p><?php __('Ferina','Ferina');?></p>
			<?php endif ;?>
			</div>
			<div id='tab2'>
			<?php if(get_option('retail_desc') != false):?>
				<p><?php echo get_option('retail_desc');?></p>
			<?php else :?>
				<p><?php echo __('Ferina Batik serve grossir online fashion women and men with the motif. Ferina Batik offers  famous brands in Indonesia','Ferina');?></p>
			<?php endif ;?>
			</div> 
		</div> 
	</div> 	
</div>
<?php endif;?>