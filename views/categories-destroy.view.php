<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Borrar Categories</h1>

            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require 'views/categories/form-delete.view.php' ?>
            <?php else: ?>
                <h2>La categoria <?= $categoria->getNom() ?> ha sigut borrada.</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>