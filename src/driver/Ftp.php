<?php
declare(strict_types = 1);

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\Ftp\FtpAdapter;
use League\Flysystem\Ftp\FtpConnectionOptions;
use think\filesystem\Driver;

class Ftp extends Driver
{
    protected function createAdapter(): FilesystemAdapter
    {
        if (!isset( $this->config['root'] )) {
            $this->config['root'] = '';
        }
        return new FtpAdapter( FtpConnectionOptions::fromArray( $this->config ) );
    }
}