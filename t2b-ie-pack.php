<?php
/*
Plugin Name: Theme to Browser Control - IE Pack
Description: An extension for the Theme to Browser Control (T2B) to handle different versions of IE. Requires the T2B plugin to be installed first https://wordpress.org/plugins/theme-to-browser-t2b-control/.
Version: 1.0
Author: Federico Jacobi
Author URI: http://www.federicojacobi.com
*/

class T2B_ie_pack {
	var $browsers = array();

	function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	
	function init() {
		add_filter( 't2b-extra-text', array( $this, 'ie_pack_text' ) );
		add_filter( 't2b-browsers', array( $this, 'ie_pack' ) );
	}
	
	function ie_pack( $browsers ) {
		unset( $browsers[ 'ie' ] );
		
		$ie_pack = array( 
			'ie11' => array( 
				'regex' => '|Mozilla\/5\.0.*(rv:11.[0-9]{1,2})|',
				'title' => 'Internet Explorer 11'
			),
			'ie10' => array( 
				'regex' => '|MSIE (10?.[0-9]{1,2})|',
				'title' => 'Internet Explorer 10'
			),
			'ie9' => array( 
				'regex' => '|MSIE (9?.[0-9]{1,2})|',
				'title' => 'Internet Explorer 9'
			),
			'ie8' => array( 
				'regex' => '|MSIE (8?.[0-9]{1,2})|',
				'title' => 'Internet Explorer 8'
			),
			'ie7' => array( 
				'regex' => '|MSIE (7?.[0-9]{1,2})|',
				'title' => 'Internet Explorer 7'
			),
			'ie6' => array( 
				'regex' => '|MSIE (6?.[0-9]{1,2})|',
				'title' => 'Internet Explorer 6, 6.01, 6.1'
			),
		);
		
		return array_merge( $ie_pack, $browsers );
	}
	
	function ie_pack_text( $t ) {
		return $t . '<p>Featuring IE Pack <img src="' . plugins_url( 'ie11.png', __FILE__ ) . '" style="vertical-align:middle;" /></p>';
	}
}
new T2B_ie_pack();