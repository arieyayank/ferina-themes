 
<div class="callbacks_container">
	<ul class="rslides" id="slider4"> 
		<?php while (have_posts()) : the_post(); ?> 
		<?php 
			$args = array(
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_parent' => $post->ID
			);
			$images = get_posts( $args );
		?>   
		<?php  
			$full = 'full'; 
			foreach($images as $image):  
			echo '<li>';
			echo '<img src="'. wp_get_attachment_url($image->ID, $full) .'">';
			echo '</li>';
			endforeach;
		?> 
	<?php endwhile; wp_reset_postdata(); ?> 
	</ul> 
</div>