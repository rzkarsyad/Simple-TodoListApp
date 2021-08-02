<?php

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "todo_app");

    if (!$conn) {
        die("Koneksi Gagal!");
    } else {
        return $conn;
    }
}

function query($query)
{
    $koneksi = koneksi();
    $result = mysqli_query($koneksi, $query);
    return $result;
}

function get_result($result)
{
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function notification($pesan)
{
    echo "<script>alert('$pesan')</script>";
}
