<?php
include 'conection.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
    $halaman_buku = isset($_POST['halaman_buku']) ? $_POST['halaman_buku'] : '';
    $penulis_buku = isset($_POST['penulis_buku']) ? $_POST['penulis_buku'] : '';
    $penerbit_buku = isset($_POST['penerbit_buku']) ? $_POST['penerbit_buku'] : '';
    $jumlah_terjual = isset($_POST['jumlah_terjual']) ? $_POST['jumlah_terjual'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO buku VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $judul_buku, $halaman_buku, $penulis_buku, $penerbit_buku, $jumlah_terjual]);
    // Output message
    $msg = 'Buku ditambahkan!';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Aplikasi CRUD PUTRI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="cover d-flex mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">CRUD home work</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link " href="/phpcrudputri">Home</a>
                    <a class="nav-link active" href="databuku.php">Data buku</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner">
            <h1 class="cover-heading">Tambah data buku</h1>
            <?php if ($msg) : ?>
            <h3 class="text-success"><?= $msg ?></h3>
            <a class="btn btn-sm btn-secondary" href="databuku.php">Kembali</a>
            <?php endif; ?>
            <div class="col md-10">
                <form method="post" action="tambahbuku.php">
                    <div class="form-group">
                        <input type="hidden" name="id" value="auto" id="id">
                    </div>
                    <div class="form-group">
                        <label for="judul_buku">Judul buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="halaman_buku">Halaman buku</label>
                        <input type="number" class="form-control" id="halaman_buku" name="halaman_buku">
                    </div>
                    <div class="form-group">
                        <label for="penulis_buku">Penulis buku</label>
                        <input type="text" class="form-control" id="penulis_buku" name="penulis_buku">
                    </div>
                    <div class="form-group">
                        <label for="penerbit_buku">Penerbit buku</label>
                        <input type="text" class="form-control" id="penerbit_buku" name="penerbit_buku">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_terjual">Jumlah terjual</label>
                        <input type="number" class="form-control" id="jumlah_terjual" name="jumlah_terjual">
                    </div>
                    <input type="submit" value="Create" class="btn btn-sm btn-primary">
                    <!-- <button type="submit" class="btn btn-sm btn-primary">Tambah</button> -->
                </form>

            </div>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Tugas : Mata kuliah Design web</p>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>