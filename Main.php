<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/models/Users.php';

$users = new Users();
$action = $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'list':
            echo json_encode($users->all());
            break;

        case 'create':
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            echo json_encode($users->create($name, $email));
            break;

        case 'update':
            $id = trim($_POST['id'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            echo json_encode($users->update($id, $name, $email));
            break;

        case 'delete':
            $id = trim($_POST['id'] ?? '');
            echo json_encode($users->delete($id));
            break;

        default:
            echo json_encode(['success' => false, 'error' => 'invalid_action', 'message' => 'Invalid action']);
            break;
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'server_error', 'message' => 'Server error: ' . $e->getMessage()]);
}
