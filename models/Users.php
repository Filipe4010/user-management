<?php
class Users {
    private $file;
    private $users = [];

    public function __construct() {
        $this->file = __DIR__ . '/../database/users.json';
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
        $this->users = json_decode(file_get_contents($this->file), true);
    }

    public function all() {
        return $this->users;
    }

    public function find($id) {
        foreach ($this->users as $user) {
            if ($user['id'] == $id) return $user;
        }
        return null;
    }

    public function findByEmail($email, $excludeId = null) {
        foreach ($this->users as $u) {
            if ($u['email'] === $email && $u['id'] != $excludeId) {
                return $u;
            }
        }
        return null;
    }

    public function save() {
        return file_put_contents($this->file, json_encode(array_values($this->users), JSON_PRETTY_PRINT)) !== false;
    }

    public function create($name, $email) {
        if (!$name || !$email) {
            return ['success' => false, 'error' => 'empty_fields', 'message' => 'Name and Email are required'];
        }
        if ($this->findByEmail($email)) {
            return ['success' => false, 'error' => 'email_exists', 'message' => 'Email already exists'];
        }

        $id = !empty($this->users) ? max(array_column($this->users, 'id')) + 1 : 1;
        $this->users[] = ['id' => $id, 'name' => $name, 'email' => $email];

        if ($this->save()) {
            return ['success' => true];
        }

        return ['success' => false, 'error' => 'save_failed', 'message' => 'Failed to save user'];
    }

    public function update($id, $name, $email) {
        if (!$id || !$name || !$email) {
            return ['success' => false, 'error' => 'empty_fields', 'message' => 'ID, Name and Email are required'];
        }

        $index = array_search($id, array_column($this->users, 'id'));
        if ($index === false) {
            return ['success' => false, 'error' => 'not_found', 'message' => 'User not found'];
        }

        if ($this->findByEmail($email, $id)) {
            return ['success' => false, 'error' => 'email_exists', 'message' => 'Email already exists'];
        }

        $this->users[$index]['name'] = $name;
        $this->users[$index]['email'] = $email;

        if ($this->save()) {
            return ['success' => true];
        }

        return ['success' => false, 'error' => 'save_failed', 'message' => 'Failed to update user'];
    }

    public function delete($id) {
        $index = array_search($id, array_column($this->users, 'id'));
        if ($index === false) {
            return ['success' => false, 'error' => 'not_found', 'message' => 'User not found'];
        }

        $this->users = array_values(array_filter($this->users, fn($u) => $u['id'] != $id));

        if ($this->save()) {
            return ['success' => true];
        }

        return ['success' => false, 'error' => 'delete_failed', 'message' => 'Failed to delete user'];
    }
}
