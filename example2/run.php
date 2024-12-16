<?php

require_once '../src/jblond/cli/Cli.php';
require_once '../src/jblond/cli/CliColors.php';
require_once './Core.php';
require_once './Boot.php';

$boot = new Boot();
$boot->run();
