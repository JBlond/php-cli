<?php

use jblond\cli\Cli;

require_once '../src/jblond/cli/Cli.php';

$cli = new Cli();
$cli->addOption('v')->addOption('output', 'file.txt')->addOption('threads', 8);
$command = 'my-program ' . $cli->buildArguments();
echo $command;
exec($command, $output, $returnCode);
