<?php
require_once __DIR__ . '/controllers/UsersController.php';

$controller = new UsersController();
$action = $_GET['action'] ?? null;

if ($action === 'create') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    echo json_encode(['success' => $controller->addUser($name, $email)]);
    exit;
}

if ($action === 'update') {
    $id = $_POST['id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    echo json_encode(['success' => $controller->editUser($id, $name, $email)]);
    exit;
}

if ($action === 'delete') {
    $id = $_POST['id'] ?? 0;
    echo json_encode(['success' => $controller->removeUser($id)]);
    exit;
}

if ($action === 'list') {
    echo json_encode($controller->getUsers());
    exit;
}
