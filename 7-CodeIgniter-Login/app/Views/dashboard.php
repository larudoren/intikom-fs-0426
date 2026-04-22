<!DOCTYPE html>

<html lang=”id”>

<head>

    <meta charset=”UTF-8″>

    <title>Dashboard</title>

    <link href=”https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css” rel=”stylesheet”>

</head>

<body>

<div class=”container mt-5″>

    <h3>Halo, <?= session()->get('username') ?>! Kamu telah berhasil login.</h3>

    <p>Email: <?= session()->get('user_email') ?></p>

    <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>

</div>

</body>

</html>