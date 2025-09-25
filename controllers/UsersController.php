<?php
require_once __DIR__ . '/../models/Users.php';

class UsersController {
    private $model;

    public function __construct() {
        $this->model = new Users();
    }

    public function getUsers() {
        return $this->model->all();
    }

    public function addUser($name, $email) {
        return $this->model->create($name, $email);
    }

    public function editUser($id, $name, $email) {
        return $this->model->update($id, $name, $email);
    }

    public function removeUser($id) {
        return $this->model->delete($id);
    }
}
