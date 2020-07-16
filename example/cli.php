<?php

use jblond\cli\Cli;
use jblond\cli\CliColors;

require '../src/jblond/cli/Cli.php';
require '../src/jblond/cli/CliColors.php';

$cli = new Cli();
$colors = new CliColors();

$string = $colors->getColoredString('This is a test','red','black');
$cli->output($string);
$cli->error($string);
$cli->input('Hello world: ',array('Hello','world'));
$cli->input('Test2: ', 'test');

$answer = $cli->input('Do this? y/N', array('y','n','Y','N'), 'N');
echo $answer;
