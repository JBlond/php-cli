<?php
namespace jblond\cli;


/**
 * Class cli
 * @package jblond\helper
 */
class Cli {

	/**
	 * @param string $prompt
	 * @param array|string $validInputs
	 * @param string $default
	 * @return string
	 */
	public function input($prompt, $validInputs, $default = ''){
		echo $prompt;
		$input = trim(fgets(fopen('php://stdin', 'r')));
		while(
			!isset($input) ||
			(
				is_array($validInputs) &&
				!in_array($input, $validInputs)
			) ||
			(
				$validInputs == 'is_file' &&
				!is_file($input)
			)
		){
			echo $prompt;
			$input = trim(fgets(fopen('php://stdin', 'r')));
			if(empty($input) && !empty($default)) {
				$input = $default;
			}
		}
		return $input;
	}

	/**
	 * @param string $output
	 */
	public function output($output){
		$out = fopen('php://output', 'w');
		fputs($out, $output);
		fclose($out);
	}

	/**
	 * @param string $string
	 */
	public function error($string){
		$stdError = fopen('php://stderr', 'w');
		fwrite($stdError, $string);
		fclose($stdError);
	}
}
