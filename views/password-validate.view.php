<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Canvi de contrassenya</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require  __DIR__ . '/users/form-edit-password.view.php'; ?>
            <?php else: ?>
                <h2>La contrassenya ha sigut actualitzada correctament!!</h2>
            <?php endif ?>

        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>
