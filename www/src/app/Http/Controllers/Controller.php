<?php

namespace App\Http\Controllers;

use App\Interfaces\Http\Controllers\ControllerInterface;
use App\Interfaces\Http\StatusCodes\ClientErrorInterface;
use Services\Http\WebController;


class Controller implements ControllerInterface, ClientErrorInterface
{
    use WebController;

    /**
     * @return mixed
     */
    public function view()
    {
        // TODO: Implement view() method.
    }

    /**
     * @return mixed
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function update(array $params)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}