<?php
require_once 'config/database.php';

class ItemModel extends Database {

    public function showAllItem() {
        $query = "SELECT * FROM items";
        $result = $this->conn->query($query);
        return $result;
    }

    public function userUnit($user_id) {
        $query = "SELECT * FROM users WHERE id = $user_id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function store($data) {
        $nama = $this->conn->real_escape_string($data['nama']);
        $harga = $this->conn->real_escape_string($data['harga']);
        $query = "INSERT INTO items (nama, harga) VALUES ('$nama', '$harga')";
        return $this->conn->query($query);
    }

    public function update($id, $data) {
        $nama = $this->conn->real_escape_string($data['nama']);
        $harga = $this->conn->real_escape_string($data['harga']);
        $query = "UPDATE items SET nama='$nama', harga='$harga' WHERE id=$id";
        return $this->conn->query($query);
    }

    public function delete($id) {
        $query = "DELETE FROM items WHERE id=$id";
        return $this->conn->query($query);
    }

    public function find($id) {
        $query = "SELECT * FROM items WHERE id=$id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}
?>
