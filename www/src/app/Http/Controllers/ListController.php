<?php

namespace App\Http\Controllers;

use Services\Storage\Storage;

class ListController extends Controller
{
    protected Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage();
        return $this->storage->connect("Redis");
    }

    public function index()
    {
        $this->storage->set("mykey", "apachel33t");

        echo $this->storage->get("mykey");
    }

    public function create(array $params = [])
    {
        // TODO Validation
        $this->storage->set($params['key'], $params['value']);
        // TODO Exceptions
    }

    public function update(array $params = [])
    {
        // TODO Validation
        $this->storage->update($params['key'], $params['value']);
        // TODO Exceptions
    }

    public function remove(array $params = [])
    {
        // TODO Validation
        $this->storage->remove($params['key']);
        // TODO Exceptions
    }
}