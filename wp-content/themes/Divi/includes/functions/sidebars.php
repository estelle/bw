<?php
function et_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'Divi' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_pb_widget -->',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Upper Footer Area', 'Divi' ) . ' #1',
		'id' => 'upper-footer-sidebar-1',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Upper Footer Area', 'Divi' ) . ' #2',
		'id' => 'upper-footer-sidebar-2',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Area', 'Divi' ) . ' #1',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area', 'Divi' ) . ' #2',
		'id' => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area', 'Divi' ) . ' #3',
		'id' => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area', 'Divi' ) . ' #4',
		'id' => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .fwidget -->',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	) );
	
    register_sidebar(array(
        'name'          => __('Pre Header', 'Divi'),
        'id'            => 'pre-header',
        'before_widget' => '<div id="%1$s" class="fwidget et_pb_widget %2$s">',
        'after_widget' => '</div> <!-- end .fwidget -->',
        'before_title' => '<h4 class="title">',
        'after_title' => '</h4>'
	));

	$et_pb_widgets = get_theme_mod( 'et_pb_widgets' );

	if ( $et_pb_widgets['areas'] ) {
		foreach ( $et_pb_widgets['areas'] as $id => $name ) {
			register_sidebar( array(
				'name' => sanitize_text_field( $name ),
				'id' => sanitize_text_field( $id ),
				'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
				'after_widget' => '</div> <!-- end .et_pb_widget -->',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			) );
		}
	}
}
add_action( 'widgets_init', 'et_widgets_init' );