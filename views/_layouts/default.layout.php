<!DOCTYPE html>
<html lang="en">
<head>
    <?php use App\Entity\Movie;
    use App\Entity\Partner;

    require __DIR__ . '/../_partials/head.partial.php' ?>
</head>
<body class="">
<header>
    <?php require __DIR__ . '/../_partials/header.partial.php' ?>
</header>
<main class="">
<?=$content?>
</main>
<?php require __DIR__ . '/../_partials/footer.partial.php' ?>
</body>
</html>