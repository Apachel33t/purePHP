<?php

namespace App\Console;

use Config\Console;
use Services\Storage\Storage;

class StorageConsole extends Storage
{
    protected array $config;

    public function __construct()
    {
        $this->config = Console::getConfig();
        $this->storage = $this->connect($this->config['storage']);
    }
}