<?php
namespace jblond;


/**
 * Class cli
 * @package jblond
 */
class cli {

	/**
	 * @param string $prompt
	 * @param array|string $valid_inputs
	 * @param string $default
	 * @return string
	 */
	public function input($prompt, $valid_inputs, $default = ''){
		echo $prompt;
		$input = trim(fgets(fopen('php://stdin', 'r')));
		while(
			!isset($input) ||
			(
				is_array($valid_inputs) &&
				!in_array($input, $valid_inputs)
			) ||
			(
				$valid_inputs == 'is_file' &&
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
		$std_error = fopen('php://stderr', 'w');
		fwrite($std_error, $string);
		fclose($std_error);
	}
}