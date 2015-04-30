<?php
class Quizzie {

	private $plugin_dir;
	private $plugin_url;
	private $shortcode_deps_enqueued = false;
	private $all_quiz_data;

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
		add_shortcode( 'quizzie', array( $this, 'shortcode_handler' ) );
	}

	public function shortcode_handler( $atts ) {
		$quiz_id = $this->get_quiz_id_from_shortcode_atts( $atts );
		if ( ! $quiz_id ) {
			return;
		}
		$this->enqueue_shortcode_deps();
		return $this->get_quiz_html( $quiz_id );
	}

	private function get_quiz_id_from_shortcode_atts( $atts ) {
		$atts = shortcode_atts( array( 'id' => 0 ), $atts );
		return absint( $atts['id'] );
	}

	private function get_quiz_html( $quiz_id ) {
		return $this->get_view( 'quizzie', $this->get_quiz_data( $quiz_id ) );
	}

	private function get_quiz_data( $quiz_id ) {
		$all_quiz_data = $this->get_all_quiz_data();
		foreach ( $all_quiz_data as $quiz ) {
			if ( $quiz['id'] == $quiz_id ) {
				return $quiz;
			}
		}
	}

	private function get_all_quiz_data() {
		if ( ! $this->all_quiz_data ) {
			$data_file = $this->plugin_dir . 'inc/data/quizzes.json';
			$this->all_quiz_data = json_decode( file_get_contents( $data_file ), true );
		}
		return $this->all_quiz_data;
	}

	private function enqueue_shortcode_deps() {
		if ( $this->shortcode_deps_enqueued ) {
			return;
		}
		$this->enqueue_scripts();
		$this->enqueue_styles();
		$this->shortcode_deps_enqueued = true;
	}

	private function enqueue_scripts() {
		wp_enqueue_script( 'quizzie', $this->plugin_url . 'js/quizzie.js', array( 'jquery', 'backbone', 'underscore' ), true );
	}

	private function enqueue_styles() {
		wp_enqueue_style( 'quizzie', $this->plugin_url . 'css/quizzie.css' );
	}

	private function get_view( $template, $data ) {
		$template = $this->plugin_dir . 'inc/templates/' . $template . '.tpl.php';
		ob_start();
		extract( $data );
		include $template;
		return ob_get_clean();
	}

}
