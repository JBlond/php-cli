<?php
namespace jblond\cli;

/**
 * Class cli
 * @package jblond\helper
 */
class Cli {

    /**
     * @var array<int,string>
     */
    private array $arguments = [];

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
        while(
            !isset($input) ||
            (
                is_array($validInputs) &&
                !in_array($input, $validInputs, true)
            ) ||
            (
                $validInputs === 'is_file' &&
                !is_file($input)
            ) ||
            (
                !empty($validInputs) && is_string($validInputs) && $input !== $validInputs
            )
        ){
            echo $prompt;
            if(empty($input) && !empty($default)) {
                $input = $default;
            }
            else
            {
                $input = trim(fgets(fopen('php://stdin', 'rb')));
            }
        }
        return $input;
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

    /**
     * @param string $name
     * @param $value
     * @return $this
     */
    public function addOption(string $name, $value = null): self
    {
        if (strlen($name) === 1) {
            $prefix = '-';
        } else {
            $prefix = '--';
        }

        if ($value === null || $value === true) {
            $this->arguments[] = $prefix . $name;
        }
        else
        {
            if ($prefix === '-') {
                $this->arguments[] = $prefix . $name;
                $this->arguments[] = (string)$value;
            }
            else
            {
                $this->arguments[] = $prefix . $name . '=' . (string)$value;
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function buildArguments(): string
    {
        return implode(
            ' ',
            array_map('escapeshellarg', $this->arguments)
        );
    }

    /**
     * @return string[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @return $this
     */
    public function reset(): self
    {
        $this->arguments = [];

        return $this;
    }
}
