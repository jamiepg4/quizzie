<?php
class Quizzie {

	private $plugin_dir;
	private $plugin_url;
	private $shortcode_deps_enqueued = false;

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
		return '<div class="quizzie" data-id="' . esc_attr( $quiz_id ) . '"></div>';
	}

	private function enqueue_shortcode_deps() {
		if ( $this->shortcode_deps_enqueued ) {
			return;
		}
		$this->enqueue_backbone_templates();
		$this->enqueue_scripts();
		$this->enqueue_styles();
		$this->shortcode_deps_enqueued = true;
	}

	private function enqueue_backbone_templates() {
		require_once $this->plugin_dir . 'inc/templates/quizzie-backbone.template.php';
	}

	private function enqueue_scripts() {
		wp_enqueue_script( 'quizzie', $this->plugin_url . 'js/quizzie.js', array( 'jquery', 'backbone', 'underscore' ), true );
	}

	private function enqueue_styles() {
	}
}
