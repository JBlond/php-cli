<?php
require 'classes/jblond/cli.class.php';
require 'classes/jblond/cli_colors.class.php';
$cli = new \jblond\cli();
$colors = new \jblond\cli_colors();
$string = $colors->get_colored_string('This is a test','red','black');
$cli->output($string);
$cli->error($string);
echo $cli->input('Hello world: ',array('Hello','world'));
echo $cli->input('Test2: ', 'test');
