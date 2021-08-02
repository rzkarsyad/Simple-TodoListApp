<?php
require_once('main.php');

$aktivitas = $_POST['aktivitas'];
$sql = "INSERT INTO todo (aktivitas) VALUE ('$aktivitas')";

$eksekusi = query($sql);
if ($eksekusi) {
    header('Location: ../index.php?pesan=Data berhasil ditambahkan');
} else {
    header('Location: ../index.php?pesan=Data gagal ditambahkan');
}
