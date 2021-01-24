<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Edit user</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require 'views/users/form-edit.view.php'; ?>
            <?php else: ?>
                <h2>The user has been updated successfully!</h2>
            <?php endif ?>

        </div>
        <div class="col-4"></div>
    </div>
    <!-- /.row -->
</div>
