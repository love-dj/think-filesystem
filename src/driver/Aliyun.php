<?php

declare(strict_types=1);

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use yzh52521\Flysystem\Oss\OssAdapter;
use think\filesystem\Driver;

class Aliyun extends Driver
{
    /**
     * @throws \OSS\Core\OssException
     */
    protected function createAdapter(): FilesystemAdapter
    {
        return new OssAdapter($this->config);
    }
}
