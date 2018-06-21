<?php
require 'classes/jblond/cli/Cli.php';
require 'classes/jblond/cli/CliColors.php';
$cli = new \jblond\cli\Cli();
$colors = new \jblond\cli\CliColors();
$string = $colors->getColoredString('This is a test','red','black');
$cli->output($string);
$cli->error($string);
echo $cli->input('Hello world: ',array('Hello','world'));
echo $cli->input('Test2: ', 'test');
print_r($colors->getForegroundColors());
print_r($colors->getBackgroundColors());