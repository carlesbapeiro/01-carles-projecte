<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit productes</h1>
            <?php if (!empty($errors) || ($isGetMethod)) : ?>
                <?php if (!empty($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php require __DIR__ . '/productes/form-edit.view.php' ?>
            <?php else: ?>
                <h2>El producte s'ha actualitzat correctament</h2>
            <?php endif; ?>

        </div>
    </div>
    <!-- /.row -->
</div>