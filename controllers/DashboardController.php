<?php
class DashboardController {
    private $conn;

    public function __construct($db = null) {
        $this->conn = $db;
    }

    public function index() {
        $query = "SELECT * FROM items";
        $result = $this->conn->query($query);

        $cars = [];
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }

        include "views/dashboard/index.php";
    }
}
?>
