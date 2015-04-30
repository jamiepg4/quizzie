<?php
class Quizzie {

	private $plugin_dir;
	private $plugin_url;

	private static $instance;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
			self::$instance->setup_actions();
		}

		return self::$instance;
	}

	function __construct() {
		$this->plugin_dir = plugin_dir_path( dirname( __FILE__ ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__ ) );
	}

	private function setup_actions() {
	}
}
