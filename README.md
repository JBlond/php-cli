# php-cli

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


// This input requires any input

$cli->input('Free input: ', '');

// Question with default N 
$answer = $cli->input('Do this? y/N', array('y','n','Y','N'), 'N');
echo $answer;
```

Inspired by the php.net docs
http://php.net/manual/en/features.commandline.io-streams.php

and a modified version of 
http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
