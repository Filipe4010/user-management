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

    public function save() {
        file_put_contents($this->file, json_encode(array_values($this->users), JSON_PRETTY_PRINT));
    }

    public function create($name, $email) {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) return false;
        }
        $id = !empty($this->users) ? max(array_column($this->users, 'id')) + 1 : 1;
        $this->users[] = ['id' => $id, 'name' => $name, 'email' => $email];
        $this->save();
        return true;
    }

    public function update($id, $name, $email) {
        foreach ($this->users as &$user) {
            if ($user['id'] == $id) {
                foreach ($this->users as $u) {
                    if ($u['email'] === $email && $u['id'] != $id) return false;
                }
                $user['name'] = $name;
                $user['email'] = $email;
                $this->save();
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        $this->users = array_filter($this->users, fn($u) => $u['id'] != $id);
        $this->save();
        return true;
    }
}
