<?php

/**
 *
 */
class Boot extends Core
{
    /**
     * @return void
     */
    private function print_basic(): void
    {
        $this->cli->output( 'MBR BIOS (C) 2017 ');
        $this->nl();
        $this->cli->output('F8000 M3 + TE (N5789CN357) BIOS Date: 12/28/17');
        $this->nl();
        $this->cli->output( 'CPU:  MBR (tm) 64 X2 Dual Core Processor 7000');
        $this->nl();
        $this->cli->output('Speed : 3.5GHz' . $this->tab() . 'Count : 2');
        $this->nl();
        $this->cli->output( $this->tab() . 'DCT0 = 800 MT/s');
        $this->nl();
        $this->nl();
        $this->cli->output( 'Press F13 to run Setup');
        $this->nl();
        $this->cli->output( 'Press F14 for BBS POPUP');
        $this->nl();
        $this->cli->output( 'Press F15 for BIOS POST Flash');
        $this->nl();
        $this->sleep_short();
        $this->cli->output( '1 MBR North Bridge. Rev M2');
        $this->nl();
        $this->cli->output( 'PMU ROM Version: 8204');
        $this->nl();
        $this->cli->output( 'NVMM ROM Version: 1.0.1');
        $this->nl();
    }

    /**
     * @return void
     */
    private function init_usb(): void
    {
        $this->cli->output( 'Initialize USB Controllers .. ');
        $this->sleep_short();
        $this->sleep_short();
        $this->cli->output( 'DONE');
        $this->nl();
    }

    /**
     * @return void
     */
    private function check_ram(): void
    {
        $this->sleep_short();
        $this->cli->output( '4096 MB OK');
        $this->nl();
    }

    /**
     * @return void
     */
    private function detect_usb_devices(): void
    {
        $this->cli->output('USB Device(s): ');
        $this->sleep_short();
        $this->sleep_short();
        $this->cli->output( '1 Keyboard');
        $this->nl();
        $this->nl();
    }

    /**
     * @param int $number
     * @return void
     */
    private function detect_sata_disk(int $number): void
    {
        $this->cli->output( 'Auto Detecting SATA ' . $number . ' ');
        $this->sleep_short();
        $this->cli->output( '.');
        $this->sleep_short();
        $this->cli->output( '.');
        $this->sleep_short();
        $this->cli->output( '.');
        $this->sleep_short();
        $this->cli->output( '.');
        $this->sleep_short();
        $this->cli->output( ' SATA Hard Disk: MCB HD7548LL  1BB001911');
        $this->nl();
    }

    /**
     * @return void
     */
    private function boot_menu(): void
    {
        $this->nl();
        $this->nl();
        $boot_line_one = $this->colors->getColoredString(
            '        Linux version 4.9.0-4-amd64                                          ',
            'black',
            'light_gray'
        );
        $this->cli->output($boot_line_one);
        $this->nl();
        $this->cli->output( '        Linux version 4.9.0-4-amd64 0-rescue-d356eb3cedf6444d8a7ca042e20dafdb        ');
        $this->nl();
        $this->sleep_5();
        $this->clear();
    }

    /**
     * @return void
     */
    private function loader(): void
    {
        $this->nl();
        $this->nl();
        $boot_loader_segment = $this->colors->getColoredString( ' ', 'black', 'light_gray');
        for ($counter = 0; $counter <= 70; $counter++){
            $this->cli->output( $boot_loader_segment);
            $this->sleep_loader();
        }

        //jump back to start of the line aka override
        echo "\r";

        $boot_loader_segment2 = $this->colors->getColoredString( ' ', 'white', 'blue');
        for ($counter2 = 0; $counter2 <= 70; $counter2++){
            $this->cli->output( $boot_loader_segment2);
            $this->sleep_loader();
        }
    }

    /**
     * @return void
     */
    private function login(): void
    {
        $this->cli->output( 'Linux 2024 SIM tty1');
        $this->nl();
        $this->cli->input( 'login: ', array('root'));
        $this->clear();
        $this->cli->input( 'password: ', array('root'));
        $this->nl();
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $this->beep();
        $this->print_basic();
        $this->init_usb();
        $this->check_ram();
        $this->detect_usb_devices();
        $this->detect_sata_disk( 1);
        $this->detect_sata_disk( 2);
        $this->nl();
        $this->sleep_3();
        $this->clear();
        $this->nl();
        $this->nl();
        $this->cli->input( 'Please unlock disk sda5_encrypt:  ', array('123456'));
        $this->decrypt_disk();
        $this->clear();
        $this->boot_menu();
        $this->loader();
        $this->nl();
        $this->nl();
        $this->getClear();
        $this->nl();
        $this->login();
        $this->clear();
        $this->cli->output($this->ps());
    }

    /**
     * @return void
     */
    public function getClear() : void
    {
        $this->clear();
    }

}
