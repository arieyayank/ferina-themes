<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $args = array('post_type' => 'retail-produk', 'posts_per_page' => 10, 'paged' => $paged  ); ?>
<?php $wpqprod = new WP_Query($args); ?>

<?php if ( $wpqprod->have_posts() ) : ?>

<?php while ($wpqprod->have_posts()) : $wpqprod->the_post(); ?>

<?php endwhile; ?>

<?php endif; ?>