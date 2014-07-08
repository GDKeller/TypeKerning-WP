<?php
/**
 * Plugin Name: TypeKern WP
 * Plugin URI: 
 * Description: Easily kern your type in WordPress
 * Version: 0.1
 * Author: Keller Digital
 * Author URI: http://kellerdigital.com
 * License:
 */
/*
Copyright 2013

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


function load_scripts() {

	wp_enqueue_script( 'lettering', plugins_url( 'js/jquery.lettering.js' , __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_script( 'call-lettering', plugins_url( 'js/call-lettering.js' , __FILE__ ), array( 'jquery' ), null, true );


	if ( is_user_logged_in() ) {
		$PluginPath = plugins_url ;
		

		wp_enqueue_script( 'kern', plugins_url( 'js/kern.js' , __FILE__ ), array( 'jquery' ), null );
		wp_enqueue_script( 'call-kern', plugins_url( 'js/call-kern.js' , __FILE__ ), array( 'jquery' ), null, true );
		wp_localize_script( 'call-kern', 'plugins_path', $PluginPath );
		wp_enqueue_style( 'kern-style', plugins_url( 'css/kernjs.css' , __FILE__ ) );
		
		

	}


}

add_action( 'wp_enqueue_scripts', 'load_scripts');


//[kern] shortcode
function kern_func( $atts, $content = null ){
	return '<div class="fancy_title">' . $content . '</div>';
}
add_shortcode( 'kern', 'kern_func' );



?>