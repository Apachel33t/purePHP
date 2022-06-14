<?php

namespace Config;

use App\Interfaces\Config\ConfigInterface;

class Storage implements ConfigInterface{
    /**
     * Return storage config
     * @return array[]
     */
    public static function getConfig(): array
    {
        return [
            'memcached' => [
                'address' => getenv("MEMCACHED_ADDRESS"),
                'port' => getenv("MEMCACHED_PORT"),
            ],
            'redis' => [
                'address' => getenv("REDIS_ADDRESS"),
                'port' => getenv("REDIS_PORT"),
                'password' => getenv("REDIS_PASSWORD"),
                'ttl' => 3600,
            ]
        ];
    }
}