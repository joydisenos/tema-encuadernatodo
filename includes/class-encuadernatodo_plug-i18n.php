<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://joydisenos.com.ve/
 * @since      1.0.0
 *
 * @package    Encuadernatodo_plug
 * @subpackage Encuadernatodo_plug/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Encuadernatodo_plug
 * @subpackage Encuadernatodo_plug/includes
 * @author     Joseph Vásquez <joydisenos@gmail.com>
 */
class Encuadernatodo_plug_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'encuadernatodo_plug',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
