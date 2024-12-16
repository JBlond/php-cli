<?php


use jblond\cli\Cli;
use jblond\cli\CliColors;

/**
 *
 */
class Core
{
    /**
     * @var Cli
     */
    public $cli;

    /**
     * @var CliColors
     */
    public $colors;

    /**
     *
     */
    public function __construct() {
        $this->cli = new Cli();
        $this->colors = new CliColors();
    }

    /**
     *
     */
    public function __destruct() {
        $this->cli = null;
        $this->colors = null;
    }

    /**
     * @return void
     */
    public function nl(): void
    {
        echo "\n";
    }

    /**
     * @return void
     */
    public function tab(): void
    {
        echo "\t";
    }

    /**
     * @return void
     */
    public function sleep_short(): void
    {
        time_sleep_until( microtime( true ) + 0.2 );
    }

    /**
     * @return void
     */
    public function sleep_loader(): void
    {
        time_sleep_until( microtime( true ) + 0.125 );
    }

    /**
     * @return void
     */
    public function sleep_3(): void
    {
        time_sleep_until( microtime( true ) + 3 );
    }

    /**
     * @return void
     */
    public function sleep_5(): void
    {
        time_sleep_until( microtime( true ) + 5 );
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        system( "clear" );
    }

    /**
     * @param $data
     * @param $newline
     * @return void
     */
    public function hex_dump( $data, $newline = "\n" ): void
    {
        static $from = '';
        static $to = '';
        static $width = 16; # number of bytes per line
        static $pad = '.'; # padding for non-visible characters
        if( $from === '' ){
            for ( $i = 0; $i <= 0xFF; $i++ ) {
                $from .= chr( $i );
                $to .= ( $i >= 0x20 && $i <= 0x7E ) ? chr( $i ) : $pad;
            }
        }
        $hex = str_split( bin2hex( $data ), $width * 2 );
        $chars = str_split( strtr( $data, $from, $to ), $width );
        $offset = 0;
        foreach ( $hex as $i => $line ) {
            echo sprintf( '%6X', $offset ) . ' : ' . implode( ' ', str_split( $line, 2 ) ) . ' [' . $chars[$i] . ']' . $newline;
            time_sleep_until( microtime( true ) + 0.05 );
            $offset += $width;
        }
    }

    /**
     * @return void
     */
    public function decrypt_disk(): void
    {
        try {
            $data = random_bytes( 3072 );
        } Catch(\Exception $e){
            $data = 'NEVER EVER';
        }
        $this->hex_dump($data);
    }

    /**
     * @return void
     */
    public function beep(): void
    {
        echo "\x7";
    }

    /**
     * @return string
     */
    public function ps(): string
    {
        return '
PID    PPID    PGID     WINPID   TTY         UID    STIME COMMAND
 9460    9284    9460       8316  pty0      197614 17:53:31 /usr/bin/ps
10072       1   10072      10072  ?         197614 10:25:05 /usr/sbin/sshd
 9284   10072    9284       4156  pty0      197614 10:25:06 /usr/bin/bash
		';
    }

}
