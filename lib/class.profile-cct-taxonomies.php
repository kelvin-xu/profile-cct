<?php 



/**
 * Pulse_CPT class.
 */
class Pulse_CPT_Taxonomy {
	
	/**
	 * init function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function init() {
			
		$field = Profile_CCT::get_object();
	
		if( is_array( $field->taxonomies ) ):
			foreach( $field->taxonomies as $taxonomy ):
				profile_cct_register_taxonomy( $taxonomy );
			endforeach;
		endif;
		
	}
	
	/**
	 * widget_init function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function register_taxonomy( $taxonomy ) {
		$labels = array(
			'name' => $taxonomy['plural'] ,
			'singular_name' => $taxonomy['single'],
			'search_items' =>  __( 'Search '.$taxonomy['plural'] ),
			'all_items' => __( 'All '.$taxonomy['plural'] ),
			'parent_item' => __( 'Parent '.$taxonomy['single'] ),
			'parent_item_colon' => __( 'Parent '.$taxonomy['single'].":" ),
			'edit_item' => __( 'Edit '.$taxonomy['single'] ), 
			'update_item' => __( 'Update '.$taxonomy['single'] ),
			'add_new_item' => __( 'Add New '.$taxonomy['single'] ),
			'new_item_name' => __( 'New '.$taxonomy['single'].' Name' ),
			'menu_name' => __( $taxonomy['plural'] ),
		);
		
		// finally register the taxonomy
		register_taxonomy(  Pulse_CPT_Taxonomy::id( $taxonomy['single'] ) , array( 'profile_cct' ), array(
			'hierarchical' => $taxonomy['hierarchical']? true: false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => sanitize_title( $taxonomy['single'] ) ),
		));

	}
	
	/**
	 * id function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $single_taxonomy
	 * @return void
	 */
	public static function id( $single_taxonomy ) {
	
		return 'profile_cct_'.str_replace( '-','_',sanitize_title( $single_taxonomy ) );
	}
}
// Lets Play
Pulse_CPT_Taxonomy::init();