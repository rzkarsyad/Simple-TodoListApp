<?php
require_once('module/main.php');
if (isset($_GET['pesan'])) {
    notification($_GET['pesan']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</head>

<body>

    <div class="container">
        <h2><a href="index.php"><b>Aplikasi Todo List</b></a></h2>
        <p>kelola keseharianmu disini</p>

        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') : ?>
            <form action="module/tambah.php" method="POST">
                <div class="row">
                    <div class="col-75">
                        <input type="text" id="aktivitas" name="aktivitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        <?php endif; ?>

        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'ubah') : ?>
            <form action="module/ubah.php" method="POST">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                    <div class="col-75">
                        <input value="<?= $_GET['aktivitas']; ?>" type="text" id="aktivitas" name="aktivitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="Perbarui">
                    </div>
                </div>
            </form>
        <?php endif; ?>

        <br>
        <?php if (isset($_GET['aksi'])) : ?>
            <a href="index.php" class="badge badge-coklat">Batal</a>
        <?php else : ?>
            <a href="index.php?aksi=tambah" class="badge badge-coklat">tambah</a>
        <?php endif; ?>
        <br>
        <br>
        <ul>
            <?php
            $sql = "SELECT * FROM todo";
            $result = query($sql);
            $todo = get_result($result);
            ?>

            <?php foreach ($todo as $todos) : ?>
                <li class="<?= $todos['selesai'] == 1 ? 'selesai' : ''; ?>"><?= $todos['aktivitas']; ?>
                    <div class="action">
                        <?php if ($todos['selesai'] == 0) : ?>
                            <a href="module/selesai.php?id=<?= $todos['id'] ?>" class="badge badge-biru">selesai</a>
                            <a href="index.php?aksi=ubah&id=<?= $todos['id'] ?>&aktivitas=<?= $todos['aktivitas'] ?>" class="badge badge-cream">ubah</a>
                        <?php endif; ?>
                        <a href="module/hapus.php?id=<?= $todos['id'] ?>" class="badge badge-merah">hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <footer style="margin-top: 20px;">
            <small> &copy; Rzkarsyad</small>
        </footer>
    </div>
</body>

</html>