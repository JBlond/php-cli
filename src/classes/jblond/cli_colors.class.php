<?php
namespace jblond;

/**
 * Class cli_colors
 *
 * works on bash
 *
 * @package jblond
 */
class cli_colors {

	/**
	 * @var array
	 */
	private $foreground_colors = array(
		'black' => '0;30',
		'dark_gray' => '1;30',
		'blue' => '0,34',
		'light_blue' => '1;34',
		'green' => '0;32',
		'light_green' => '1;32',
		'cyan' => '0;36',
		'light_cyan' => '1;36',
		'red' => '0;31',
		'light_red' => '1;31',
		'purple' => '0;35',
		'light_purple' => '1;35',
		'brown' => '0;33',
		'yellow' => '1;33',
		'light_gray' => '0;37',
		'white' => '1;37'
	);

	/**
	 * @var array
	 */
	private $background_colors = array(
		'black' => '40',
		'red' => '41',
		'green' => '42',
		'yellow' => '43',
		'blue' => '44',
		'magenta' => '45',
		'cyan' => '46',
		'light_gray' => '47'
	);


	/**
	 * @param string $string
	 * @param null|string $foreground_color
	 * @param null|string $background_color
	 * @return string
	 */
	public function get_colored_string($string, $foreground_color = null, $background_color = null){
		$colored_string = '';

		if(isset($this->foreground_colors["$foreground_color"])){
			$colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
		}

		if(isset($this->background_colors["$background_color"])){
			$colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
		}

		$colored_string .=  $string . "\033[0m";
		return $colored_string;
	}

	/**
	 * Returns all foreground color names
	 *
	 * @return array
	 */
	public function get_foreground_colors() {
		return array_keys($this->foreground_colors);
	}


	/**
	 * Returns all background color names
	 *
	 * @return array
	 */
	public function get_background_colors() {
		return array_keys($this->background_colors);
	}
}
