<?php

namespace Services\Storage;

use Config\Storage;

class Redis {
    private static \Redis|bool $storage;

    /**
     * @return \Redis
     */
    public static function connect(): \Redis|bool
    {
        $credentials = Storage::getConfig();
        $redis = new \Redis();

        $redis->connect($credentials['redis']['address'], $credentials['redis']['port']) or die("Could not connect");
        $redis->auth($credentials['redis']['password']);
        $redis->ttl($credentials['redis']['ttl']);

        return self::$storage = $redis;
    }
}