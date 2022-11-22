<?php
declare( strict_types = 1 );

namespace think\filesystem\driver;

use Google\Cloud\Storage\StorageClient;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\GoogleCloudStorage\GoogleCloudStorageAdapter;
use think\filesystem\Driver;

class Google extends Driver
{
    protected function createAdapter(): FilesystemAdapter
    {
        $storageClient = new StorageClient( [
            'projectId' => $this->config['projectId'],
        ] );
        $bucket        = $storageClient->bucket( $this->config['bucket'] );

        return new GoogleCloudStorageAdapter( $bucket,$this->config['prefix'] ?? '' );
    }
}