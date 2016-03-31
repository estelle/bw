<?php 



function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function add_query_vars($aVars) {
	$aVars[] = "person";
	$aVars[] = "prj";
	return $aVars;
}
add_filter('query_vars', 'add_query_vars');

/**
 * Custom taxonomies
 */
function listing_taxonomy() {
   register_taxonomy(
	'industry-sector',
    'project',
		array(
			'hierarchical' => true,
			'label' => 'Industry Sector',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'industry-sector')
		)
	);
	 register_taxonomy(
	'service',
    'project',
		array(
			'hierarchical' => true,
			'label' => 'Service',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'service')
		)
	);
	 register_taxonomy(
	'building-type',
    'project',
		array(
			'hierarchical' => true,
			'label' => 'Building Type',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'building-type')
		)
	);
	register_taxonomy(
	'location',
    'project',
		array(
			'hierarchical' => true,
			'label' => 'Location',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'location')
		)
	);




/*
  register_taxonomy(
	'featured',
    'project',
		array(
			'hierarchical' => true,
			'label' => 'Featured',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'featured')
		)
	);
*/

 register_taxonomy(
	'featured',
    array('project','people', 'topic'),
		array(
			'hierarchical' => true,
			'label' => 'Featured on Front Page',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'featured')
		)
	);
	/*
	register_taxonomy(
	'featured2',
    array('project','people'),
		array(
			'hierarchical' => true,
			'label' => 'Featured on Front Page - Section 2',
			'publicly_queryable' => true,
 			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => array('slug' => 'featured2')
		)
	);
*/


}
add_action( 'init', 'listing_taxonomy' );

function create_post_type() {
	register_post_type( 
		'office',
			array(
				'labels' => array(
				'name' => __( 'Offices' ),
				'singular_name' => __( 'Office' )
			),
		'public' => true,
		'has_archive' => true, 
        'rewrite' => array('slug' => 'office'),
        'supports' => array('title','page-attributes')
		)
	);
	
	register_post_type( 
		'topic',
			array(
				'labels' => array(
				'name' => __( 'Topics' ),
				'singular_name' => __( 'Topic' )
			),
		'public' => true,
		'has_archive' => true, 
        'rewrite' => array('slug' => 'topic'),
        'supports' => array('title','page-attributes','editor','thumbnail')
		)
	);
}
add_action( 'init', 'create_post_type' );




function convert_state($name, $to='name') {
	$states = array(
	array('name'=>'Alabama', 'abbrev'=>'AL'),
	array('name'=>'Alaska', 'abbrev'=>'AK'),
	array('name'=>'Arizona', 'abbrev'=>'AZ'),
	array('name'=>'Arkansas', 'abbrev'=>'AR'),
	array('name'=>'California', 'abbrev'=>'CA'),
	array('name'=>'Colorado', 'abbrev'=>'CO'),
	array('name'=>'Connecticut', 'abbrev'=>'CT'),
	array('name'=>'Delaware', 'abbrev'=>'DE'),
	array('name'=>'Florida', 'abbrev'=>'FL'),
	array('name'=>'Georgia', 'abbrev'=>'GA'),
	array('name'=>'Hawaii', 'abbrev'=>'HI'),
	array('name'=>'Idaho', 'abbrev'=>'ID'),
	array('name'=>'Illinois', 'abbrev'=>'IL'),
	array('name'=>'Indiana', 'abbrev'=>'IN'),
	array('name'=>'Iowa', 'abbrev'=>'IA'),
	array('name'=>'Kansas', 'abbrev'=>'KS'),
	array('name'=>'Kentucky', 'abbrev'=>'KY'),
	array('name'=>'Louisiana', 'abbrev'=>'LA'),
	array('name'=>'Maine', 'abbrev'=>'ME'),
	array('name'=>'Maryland', 'abbrev'=>'MD'),
	array('name'=>'Massachusetts', 'abbrev'=>'MA'),
	array('name'=>'Michigan', 'abbrev'=>'MI'),
	array('name'=>'Minnesota', 'abbrev'=>'MN'),
	array('name'=>'Mississippi', 'abbrev'=>'MS'),
	array('name'=>'Missouri', 'abbrev'=>'MO'),
	array('name'=>'Montana', 'abbrev'=>'MT'),
	array('name'=>'Nebraska', 'abbrev'=>'NE'),
	array('name'=>'Nevada', 'abbrev'=>'NV'),
	array('name'=>'New Hampshire', 'abbrev'=>'NH'),
	array('name'=>'New Jersey', 'abbrev'=>'NJ'),
	array('name'=>'New Mexico', 'abbrev'=>'NM'),
	array('name'=>'New York', 'abbrev'=>'NY'),
	array('name'=>'North Carolina', 'abbrev'=>'NC'),
	array('name'=>'North Dakota', 'abbrev'=>'ND'),
	array('name'=>'Ohio', 'abbrev'=>'OH'),
	array('name'=>'Oklahoma', 'abbrev'=>'OK'),
	array('name'=>'Oregon', 'abbrev'=>'OR'),
	array('name'=>'Pennsylvania', 'abbrev'=>'PA'),
	array('name'=>'Rhode Island', 'abbrev'=>'RI'),
	array('name'=>'South Carolina', 'abbrev'=>'SC'),
	array('name'=>'South Dakota', 'abbrev'=>'SD'),
	array('name'=>'Tennessee', 'abbrev'=>'TN'),
	array('name'=>'Texas', 'abbrev'=>'TX'),
	array('name'=>'Utah', 'abbrev'=>'UT'),
	array('name'=>'Vermont', 'abbrev'=>'VT'),
	array('name'=>'Virginia', 'abbrev'=>'VA'),
	array('name'=>'Washington', 'abbrev'=>'WA'),
	array('name'=>'West Virginia', 'abbrev'=>'WV'),
	array('name'=>'Wisconsin', 'abbrev'=>'WI'),
	array('name'=>'Wyoming', 'abbrev'=>'WY')
	);

	$return = false;
	foreach ($states as $state) {
		if ($to == 'name') {
			if (strtolower($state['abbrev']) == strtolower($name)){
				$return = $state['name'];
				break;
			}
		} else if ($to == 'abbrev') {
			if (strtolower($state['name']) == strtolower($name)){
				$return = strtoupper($state['abbrev']);
				break;
			}
		}
	}
	return $return;
}