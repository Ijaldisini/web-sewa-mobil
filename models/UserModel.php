<?php
require_once __DIR__ . '/../config/database.php';

class UserModel extends Database {
    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}
?>
