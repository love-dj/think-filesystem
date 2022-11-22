<?php
declare(strict_types=1);

namespace think\filesystem\driver;

use League\Flysystem\FilesystemAdapter;
use Overtrue\Flysystem\Qiniu\QiniuAdapter;
use think\filesystem\Driver;

class Qiniu extends Driver
{

    protected function createAdapter(): FilesystemAdapter
    {
        return new QiniuAdapter(
            $this->config['accessKey'], $this->config['secretKey'],
            $this->config['bucket'], $this->config['domain']
        );
    }
}
