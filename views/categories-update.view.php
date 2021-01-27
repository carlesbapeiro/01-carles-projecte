<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Editar categoria</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require 'views/categories/form-edit.view.php'; ?>
            <?php else: ?>
                <h2>La categoria ha sigut actualitzada correctament!</h2>
            <?php endif ?>

        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>

