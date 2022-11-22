<?php

declare( strict_types = 1 );

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use Obs\ObsClient;
use yzh52521\Flysystem\Obs\ObsAdapter;
use think\filesystem\Driver;

class Obs extends Driver
{

    protected function createAdapter(): FilesystemAdapter
    {
        $config            = [
            'key'      => $this->config['key'],
            'secret'   => $this->config['secret'],
            'bucket'   => $this->config['bucket'],
            'endpoint' => $this->config['endpoint'],
        ];
        $client            = new ObsClient( $config );
        $config['options'] = [
            'url'             => '',
            'endpoint'        => $this->config['endpoint'],
            'bucket_endpoint' => '',
            'temporary_url'   => '',
        ];
        return new ObsAdapter( $client,$this->config['bucket'],$this->config['prefix'],null,null,$config['options'] );
    }

    public function url(string $path): string
    {
        if (isset( $this->config['url'] )) {
            return $this->concatPathToUrl( $this->config['url'],$path );
        }
        return parent::url( $path );
    }
}
