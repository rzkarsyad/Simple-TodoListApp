<?php
require_once('main.php');

$id = $_GET['id'];
$sql = "DELETE FROM todo WHERE id = $id";

$eksekusi = query($sql);
if ($eksekusi) {
    header('Location: ../index.php?pesan=Data berhasil dihapus');
} else {
    header('Location: ../index.php?pesan=Data gagal dihapus');
}
