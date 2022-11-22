<?php

declare(strict_types=1);

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use Overtrue\Flysystem\Cos\CosAdapter;
use think\filesystem\Driver;

class Qcloud extends Driver
{

    protected function createAdapter(): FilesystemAdapter
    {
        return new CosAdapter($this->config);
    }
}
