<?php
require_once __DIR__ . '/../models/ItemModel.php';

class ItemController {
    private $model;

    public function __construct() {
        session_start();
        $this->model = new ItemModel();

        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=loginForm");
            exit;
        }
    }

    public function index() {
        $items = $this->model->showAllItem();
        include __DIR__ . '/../views/list.php';
    }

    public function form($id = null) {
        $item = null;
        if ($id) {
            $item = $this->model->find($id);
        }
        include __DIR__ . '/../views/form.php';
    }

    public function store() {
        $this->model->store($_POST);
        $_SESSION['success'] = "Mobil berhasil ditambahkan!";
        header("Location: index.php?controller=item&action=index");
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        $_SESSION['success'] = "Data mobil berhasil diupdate!";
        header("Location: index.php?controller=item&action=index");
    }

    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['success'] = "Data mobil berhasil dihapus!";
        header("Location: index.php?controller=item&action=index");
    }

    public function detail($id) {
        $item = $this->model->find($id);
        include __DIR__ . '/../views/detail.php';
    }
}
?>
