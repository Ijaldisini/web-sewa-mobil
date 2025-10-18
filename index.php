<?php
session_start();
include_once "config/database.php";

$db = new Database();
$conn = $db->conn;

$controller = $_GET['controller'] ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

$controllerFile = "controllers/" . ucfirst($controller) . "Controller.php";

if (file_exists($controllerFile)) {
    include_once $controllerFile;

    $controllerClass = ucfirst($controller) . "Controller";
    $controllerObj = new $controllerClass($conn);

    if (method_exists($controllerObj, $action)) {
        if (isset($_GET['id'])) {
            // kalau ada parameter id, kirimkan ke method
            $controllerObj->$action($_GET['id']);
        } else {
            // kalau tidak, panggil tanpa argumen
            $controllerObj->$action();
        }
    } else {
        echo "Action '$action' tidak ditemukan di controller '$controllerClass'.";
    }
} else {
    echo "Controller '$controller' tidak ditemukan.";
}
