<?php

namespace Services\Storage;

use Config\Storage;

class Memcached {
    private static \Memcached|bool $storage;


    /**
     * @return \Memcached|bool
     */
    public static function connect(): \Memcached|bool
    {
        $credentials = Storage::getConfig();
        $memcached = new \Memcached();

        $memcached->addServer($credentials['memcached']['address'], $credentials['memcached']['port']);

        return self::$storage = $memcached;
    }
}