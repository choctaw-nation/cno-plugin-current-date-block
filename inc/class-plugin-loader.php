<?php
/**
 * Plugin Loader
 *
 * @package ChoctawNation
 * @subpackage CurrentDateBlock
 */

namespace ChoctawNation\Current_Date_Block;

/** Inits the Plugin */
class Plugin_Loader {
	/**
	 * The directory path of the plugin
	 *
	 * @var string $dir_path
	 */
	private string $dir_path;

	/**
	 * Constructor
	 *
	 * @param string $dir_path The directory path of the plugin
	 */
	public function __construct( string $dir_path ) {
		$this->dir_path = $dir_path;
	}

	/**
	 * Initializes the Plugin
	 *
	 * @return void
	 */
	public function activate(): void {
		// nothing to do here
	}

	/**
	 * Handles Plugin Deactivation
	 * (this is a callback function for the `register_deactivation_hook` function)
	 *
	 * @return void
	 */
	public function deactivate(): void {
		// nothing to do here
	}

	/**
	 * Handles Plugin Uninstallation
	 * (this is a callback function for the `register_uninstall_hook` function)
	 */
	public static function uninstall(): void {
		// nothing to do here
	}

	/**
	 * Loads the Plugin
	 */
	public function load_plugin(): void {
		add_action( 'init', array( $this, 'register_block' ) );
	}

	/**
	 * Register Gutenberg Block
	 */
	public function register_block() {
		$blocks_path = $this->dir_path . '/build';
		wp_register_block_types_from_metadata_collection( $blocks_path, $blocks_path . '/blocks-manifest.php' );
	}
}
