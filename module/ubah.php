<?php
require_once('main.php');

$id = $_POST['id'];
$aktivitas = $_POST['aktivitas'];

$sql = "UPDATE todo SET aktivitas = '$aktivitas' WHERE id = $id";

$eksekusi = query($sql);
if ($eksekusi) {
    header('Location: ../index.php?pesan=Aktivitas berhasil diubah');
} else {
    header('Location: ../index.php?pesan=Aktivitas gagal diubah');
}
