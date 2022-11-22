<?php

declare(strict_types=1);

namespace think\filesystem\driver;

use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use Aws\S3\S3Client;
use League\Flysystem\FilesystemAdapter;
use think\filesystem\Driver;

class S3 extends Driver
{

    protected function createAdapter(): FilesystemAdapter
    {
        $client = new S3Client( $this->config );
        return new AwsS3V3Adapter(
            $client,
            $this->config['bucket_name']
        );
    }
}
