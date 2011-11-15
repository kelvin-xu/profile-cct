<?php 

function profile_cct_publications_field_shell($action, $options ) {
	
	if( is_object($action) ):
		$post = $action;
		$action = "display";
		$data = $options['args']['data'];
		$options = $options['args']['options'];
	endif;

	$field = Profile_CCT::get_object(); // prints "Creating new instance."
	
	
	$default_options = array(
		'type' => 'publications',
		'label'=>'publications',
		'description'=>'',
		);
	$options = (is_array($options) ? array_merge( $default_options, $options ): $default_options );
	
	$field->start_field($action,$options);
	
	profile_cct_publications_field($data,$options);
	
	$field->end_field( $action, $options );
	
}
function profile_cct_publications_field( $data, $options ){
	extract( $options );
	$field = Profile_CCT::get_object();

	$field->input_field( array( 'field_type'=>$type, 'multiple'=>$multiple,'field_id'=>'publication','label'=>'', 'size'=>25, 'row'=>2, 'cols'=>20, 'value'=>$data['publication'], 'type'=>'textarea') );
}



function profile_cct_publications_display_shell( $action, $options, $data  ) {
	
	if( is_object($action) ):
		$post = $action;
		$action = "display";
		$data = $options['args']['data'];
		$options = $options['args']['options'];
	endif;

	$field = Profile_CCT::get_object(); // prints "Creating new instance."
	
	
	$default_options = array(
		'type' => 'publications',
		'label'=>'publications',
		'description'=>'',
		'hide_label'=>true,
		'before'=>'',
		'after'=>''
		);
	$options = (is_array($options) ? array_merge( $default_options, $options ): $default_options );
	
	
	$field->start_field($action,$options);
	
	profile_cct_publications_display($data,$options);
	
	
	$field->end_field( $action, $options );
	
}
function profile_cct_publications_display( $data, $options ){
	extract( $options );
	$field = Profile_CCT::get_object();
	$field->display_text( array( 'field_type'=>$type, 'class'=>'textarea publication','default_text'=>'lorem ipsum', 'value'=>$data['publication'], 'tag'=>'div', 'type'=>'text') );}

