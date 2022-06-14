<?php

namespace App\Interfaces\Storages;

interface StorageInterface {
    public function get(string|int $key);

    public function set(string|int $key, string|int $value);

    public function remove(string|int $key);

    public function update(string|int $key, string|int $value);

    public function connect(string $type);
}