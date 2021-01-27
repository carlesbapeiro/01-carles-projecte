<div class="container">
    <div class="row">
        <div clas="col-4"></div>
        <div class="col-8">
            <br>
            <h1>Nova Categoria</h1>
            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php require __DIR__ . '/categories/form-create.view.php'; ?>
            <?php else: ?>
                <h2>La categoria ha sigut creada sadisfactoriament!</h2>
            <?php endif ?>
        </div>
    </div>
