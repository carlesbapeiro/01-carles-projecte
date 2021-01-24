<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Delete producte</h1>

            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require 'views/productes/form-delete.view.php' ?>
            <?php else: ?>
                <h2>El producte <?= $producte->getNom() ?> ha sigut borrat.</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>