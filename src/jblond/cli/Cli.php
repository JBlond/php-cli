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
    public function input(string $prompt, $validInputs, string $default = ''): string
    {
        echo $prompt;

        $input = trim(fgets(fopen('php://stdin', 'rb')));

        while (true) {
            if ($input === '' && $default !== '') {
                return $default;
            }

            if ($validInputs === 'is_file' && !is_file($input)) {
                echo $prompt;
                $input = trim(fgets(STDIN));
                continue;
            }

            if (is_array($validInputs) && !in_array($input, $validInputs, true)) {
                echo $prompt;
                $input = trim(fgets(STDIN));
                continue;
            }

            if (is_string($validInputs) && !empty($validInputs) && ($input !== $validInputs)) {
                echo $prompt;
                $input = trim(fgets(STDIN));
                continue;
            }

            return $input;
        }
    }


    /**
     * @param string $output
     */
    public function output(string $output): void
    {
        $out = fopen('php://output', 'wb');
        fwrite($out, $output);
        fclose($out);
    }

    /**
     * @param string $string
     */
    public function error(string $string): void
    {
        $stdError = fopen('php://stderr', 'wb');
        fwrite($stdError, $string);
        fclose($stdError);
    }
}
