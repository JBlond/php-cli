# php-cli

[![Code Climate](https://codeclimate.com/github/JBlond/php-cli/badges/gpa.svg)](https://codeclimate.com/github/JBlond/php-cli) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/438eaa51c0464a689229709cfeb583bb)](https://www.codacy.com/app/leet31337/php-cli?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=JBlond/php-cli&amp;utm_campaign=Badge_Grade)

##

```bash
composer require jblond/php-cli
```

## php command line / cli scripting classes

### Example

```PHP
<?php
use jblond\cli\Cli;
use jblond\cli\CliColors;

$cli = new Cli();
$colors = new CliColors();

$string = $colors->getColoredString('This is a test','red','black');
$cli->output($string); // normal 
$cli->error($string); // error 

// This input requires Hello or world as input
$cli->input('Hello world: ',array('Hello','world'));

// This input requires only test

$cli->input('Test2: ', 'test');

// Question with default N 
$answer = $cli->input('Do this? y/N', array('y','n','Y','N'), 'N');
echo $answer;
```

Inspired by the php.net docs
http://php.net/manual/en/features.commandline.io-streams.php

and a modified version of 
http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
