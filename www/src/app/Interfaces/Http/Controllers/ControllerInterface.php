<?php

namespace App\Interfaces\Http\Controllers;

interface ControllerInterface {
    public function view();

    public function index();

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function update(array $params);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}