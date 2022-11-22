<?php
declare( strict_types = 1 );

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\PhpseclibV3\SftpAdapter;
use League\Flysystem\PhpseclibV3\SftpConnectionProvider;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use think\filesystem\Driver;

class Sftp extends Driver
{
    protected function createAdapter(): FilesystemAdapter
    {
        $provider = SftpConnectionProvider::fromArray( $this->config );

        $root = $this->config['root'] ?? '/';

        $visibility = PortableVisibilityConverter::fromArray(
            $this->config['permissions'] ?? []
        );

        return new SftpAdapter( $provider,$root,$visibility );
    }
}