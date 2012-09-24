<?php 



/**
 * Pulse_CPT class.
 */
class Pulse_CPT_Fields {
	static private $classobj = NULL;

	static public  $textdomain  = NULL;
	static public  $action   = NULL;
	static public  $settings_options = NULL;
	static public  $form_fields = NULL;
	static public  $taxonomies = NULL;
	static public  $is_main_query = false;
	static public  $form_field_options = NULL;
	static public  $option     = NULL; 
	static public  $current_form_fields = NULL; // stores the current state of the form field... the labels and if it is on the banch... 
	
	
	function __construct () {
		
	}
	/**
	 * init function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	public static function init() {
		
		
	}
	
	function get_object() {
	
		if ( NULL === self :: $classobj )
			self :: $classobj = new self;

		return self :: $classobj;
	}
	
	

}

if ( function_exists( 'add_action' ) && class_exists( 'Pulse_CPT_Fields' ) )
	add_action( 'plugins_loaded', array( 'Pulse_CPT_Fields', 'get_object' ) );

