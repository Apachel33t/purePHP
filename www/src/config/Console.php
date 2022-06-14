<?php

namespace Config;

use App\Interfaces\Config\ConfigInterface;

class Console implements ConfigInterface
{
    /**
     * Return console config
     * @return array[]
     */
    public static function getConfig(): array
    {
        return [
            'storage' => 'Redis'
        ];
    }
}