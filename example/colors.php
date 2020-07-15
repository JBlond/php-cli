<?php

use jblond\cli\Cli;
use jblond\cli\CliColors;

require '../src/jblond/cli/Cli.php';
require '../src/jblond/cli/CliColors.php';
$cli = new Cli();
$colors = new CliColors();

$allForegroundColors = $colors->getForegroundColors();
$allBackgroundColors = $colors->getBackgroundColors();

foreach ($allForegroundColors as $color) {
    foreach ($allBackgroundColors as $bgColor) {
        $cli->output(
            $colors->getColoredString($color . ' on ' . $bgColor, $color, $bgColor)
        );
        $cli->output($colors->getColoredString(' ', 'default', 'default'));
    }
}
