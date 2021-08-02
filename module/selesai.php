<?php
require_once('main.php');

$id = $_GET['id'];
$sql = "UPDATE todo SET selesai = 1 WHERE id = $id";

$eksekusi = query($sql);
if ($eksekusi) {
    header('Location: ../index.php?pesan=Aktivitas berhasil diselesaikan');
} else {
    header('Location: ../index.php?pesan=Aktivitas gagal diselesaikan');
}
