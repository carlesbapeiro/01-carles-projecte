<div class="container">
    <div class="row">
        <div clas="col-4"></div>
        <div class="col-8">
            <h1>Storing Users</h1>

            <?php
            if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require __DIR__ . '/users/form-create.view.php'; ?>
            <?php else: ?>
                <h2>The User has been inserted successfully!</h2>
            <?php endif ?>
        </div>
    </div>
    <!-- /.row -->
</div>