<div class="container">
    <div class="row">
        <div clas="col-4"></div>
        <div class="col-8">
            <h1>Nou Producte</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require __DIR__ . '/productes/form-create.view.php'; ?>
            <?php else: ?>
                <h2>The product has been inserted successfully!</h2>
            <?php endif ?>
        </div>
    </div>
    <