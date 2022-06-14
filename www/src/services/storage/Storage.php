<?php

namespace Services\Storage;

use App\Interfaces\Storages\MemcachedInterface;
use App\Interfaces\Storages\RedisInterface;
use App\Exceptions\StorageError;


class Storage implements MemcachedInterface, RedisInterface
{
    protected \Memcached|\Redis|bool $storage;

    /**
     * @param string $type
     * @return \Redis|\Memcached|bool
     */
    public function connect(string $type): \Redis|\Memcached|bool
    {
        switch ($type) {
            case self::Memcached:

                $this->storage = Memcached::connect();
                break;
            case self::Redis:

                $this->storage = Redis::connect();
                break;
            default:
                StorageError::typeDoesNotExist("Type {$type} does not exist in Services\Storage\Storage");
                $this->storage = false;
        }

        return $this->storage;
    }


    /**
     * @param string|int $key
     * @return string
     */
    public function get(string|int $key): string
    {
        return $this->storage->get($key);
    }


    /**
     * @param string|int $key
     * @param string|int|array $value
     * @return bool
     */
    public function set(string|int $key, string|int|array $value): bool
    {
        return $this->storage->set($key, $value);
    }


    /**
     * @param string|int $key
     * @return bool
     */
    public function remove(string|int $key): bool
    {
        return $this->storage->delete($key);
    }


    /**
     * @param string|int $key
     * @param string|int|array $value
     * @return bool
     */
    public function update(string|int $key, string|int|array $value): bool
    {
        return $this->storage->set($key, $value);
    }
}