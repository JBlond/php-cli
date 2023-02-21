<?php
namespace jblond\cli;

use InvalidArgumentException;

/**
 * Class CliColors
 *
 * Works on bash
 * @package jblond\helper
 */
class CliColors {

	/**
	 * @var array
	 */
	private $foregroundColors = array(
		'black' => '0;30',
		'dark_gray' => '5;30',
		'grey' => '5;30',
		'red' => '5;31',
		'light_red' => '1;31',
		'dark_red' => '0;31',
		'green' => '0;32',
		'light_green' => '1;32',
		'brown' => '0;33',
		'yellow' => '1;33',
		'blue' => '0,34',
		'light_blue' => '1;34',
		'purple' => '0;35',
		'light_purple' => '1;35',
		'cyan' => '0;36',
		'light_cyan' => '1;36',
		'light_gray' => '0;37',
		'white' => '1;37',
	);

	/**
	 * @var array
	 */
	private $backgroundColors = array(
		'black' => '40',
		'red' => '41',
		'green' => '42',
		'yellow' => '43',
		'blue' => '44',
		'magenta' => '45',
		'cyan' => '46',
		'light_gray' => '47',
	);

	/**
	 * @param string $string
	 * @param null|string $foregroundColor
	 * @param null|string $backgroundColor
	 * @return string
	 * @throws InvalidArgumentException
	 */
	public function getColoredString($string, $foregroundColor = null, $backgroundColor = null){
		$coloredString = '';

		if(!isset($this->foregroundColors[(string) $foregroundColor])){
			throw new InvalidArgumentException(sprintf('Invalid option specified: "%s". Expected one of (%s).', $foregroundColor, implode(', ', array_keys($this->foregroundColors))));
		}

		$coloredString .= "\033[" . $this->foregroundColors[$foregroundColor] . "m";
		if(isset($this->backgroundColors[(string) $backgroundColor])) {
			$coloredString .= "\033[" . $this->backgroundColors[$backgroundColor] . "m";
		}
		$coloredString .= $string . "\033[0m";
		return $coloredString;
	}

	/**
	 * Returns all foreground color names
	 *
	 * @return array
	 */
	public function getForegroundColors(): array
    {
		return array_keys($this->foregroundColors);
	}

	/**
	 * Returns all background color names
	 *
	 * @return array
	 */
	public function getBackgroundColors(): array
    {
		return array_keys($this->backgroundColors);
	}
}
