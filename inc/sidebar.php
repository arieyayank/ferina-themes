<?php
function ferina_sidebars(){
	register_sidebar(
		array(
			'name'=> __('Primary Sidebar', 'h5'),
			'id' => 'widgets_sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name'=> __('Footer Sidebar 1', 'h5'),
			'id' => 'f_sidebar1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name'=> __('Footer Sidebar 2', 'h5'),
			'id' => 'f_sidebar2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		)
	);

	register_sidebar(
		array(
			'name'=> __('Footer Sidebar 3', 'h5'),
			'id' => 'f_sidebar3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		)
	);
}