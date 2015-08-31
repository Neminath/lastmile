<?php
class TM_Customizer {
	private static $_instance;

	public $import;
	public $export;

	public $skin_manager;

	private function __construct() {
		$customizer_path = get_template_directory() . '/core/customizer/';

		require_once( $customizer_path . 'includes/class-tm-customizer-skin-manager.php' );

		$this->skin_manager = new TM_Customizer_Skin_manager();
	}

	public static function getInstance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
}

global $tm_customizer;
if ( ! $tm_customizer ) {
	$tm_customizer = TM_Customizer::getInstance();
}