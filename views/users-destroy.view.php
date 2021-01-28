<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Borrar Usuari</h1>

            <?php if (!empty($errors)) : ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require 'views/users/form-delete.view.php' ?>
            <?php else: ?>
                <h2>Lusuari <?= $user->getUsername() ?> ha sigut borrat!</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.row -->
</div>
