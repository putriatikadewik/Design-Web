<?php
include 'conection.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM buku WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $buku = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$buku) {
        exit('buku doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM buku WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Buku berhasil terhapus';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: databuku.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
} ?>
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
            <h1 class="cover-heading">Hapus buku ?</h1>
            <div class="content delete">
                <?php if ($msg) : ?>
                <h3 class="text-success"><?= $msg ?></h3>
                <a class="btn btn-sm btn-secondary" href="databuku.php">Kembali</a>
                <?php else : ?>
                <p>Yakin ingin menghapus buku #<?= $buku['judul_buku'] ?>?</p>
                <a class="btn btn-md btn-danger" href="hapusbuku.php?id=<?= $buku['id'] ?>&confirm=yes">Yakin</a>
                <a class="btn btn-md btn-success" href="hapusbuku.php?id=<?= $buku['id'] ?>&confirm=no">Tidak</a>
                <?php endif; ?>
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