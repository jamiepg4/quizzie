<?php
/**
 * Plugin Name: Quizzie
 * Version: 0.1.0-alpha
 * Description: Add quizzes to content
 * Author: Fusion Engineering and community
 * Author URI: http://next.fusion.net/tag/shortcode-ui/
 * Text Domain: quizzie
 * License: GPL v2 or later
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

require_once dirname( __FILE__ ) . '/inc/class-quizzie.php';

add_action( 'init', 'quizzie_load_textdomain' );

function Quizzie() {
	return Quizzie::get_instance();
}

add_action( 'init', 'Quizzie' );

function quizzie_load_textdomain() {
	load_plugin_textdomain( 'shortcode-ui', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
