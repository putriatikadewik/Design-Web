<?php
include 'conection.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;


// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM buku ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$buku = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Get the total number of buku, this is so we can determine whether there should be a next and previous button
$num_buku = $pdo->query('SELECT COUNT(*) FROM buku')->fetchColumn(); ?>
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
            <h1 class="cover-heading">Data buku</h1>
            <a href="tambahbuku.php" class="btn btn-sm btn-primary text-light my-2">Tambah data buku</a>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul buku</th>
                        <th scope="col">Halaman buku</th>
                        <th scope="col">Penulis buku</th>
                        <th scope="col">Penerbit buku</th>
                        <th scope="col">Jumlah terjual</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $books) : ?>
                    <tr>
                        <td><?= $books['id'] ?></td>
                        <td><?= $books['judul_buku'] ?></td>
                        <td><?= $books['halaman_buku'] ?></td>
                        <td><?= $books['penulis_buku'] ?></td>
                        <td><?= $books['penerbit_buku'] ?></td>
                        <td><?= $books['jumlah_terjual'] ?></td>
                        <td class="actions">
                            <a href="editbuku.php?id=<?= $books['id'] ?>" class="btn text-primary"><i
                                    class="fas fa-pen fa-xs"></i></a>
                            <a href="hapusbuku.php?id=<?= $books['id'] ?>" class="trash text-danger"><i
                                    class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page > 1) : ?>
                <a href="databuku.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                <?php endif; ?>
                <?php if ($page * $records_per_page < $num_buku) : ?>
                <a href="databuku.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
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