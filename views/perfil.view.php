<div class="container">
    <div class="row">
        <?php use App\Entity\User;

        if (empty($errors)) : ?>

            <div class="col my-5">


                <?php
                //TODO:Preguntar perque en perfil he de generar la imatge de una forma diferent.
                ?>
                <?= generar_imagen_local('/'. User::FOTO_PATH, $user->getFoto(),
                    $user->getUsername(), "rounded w-100") ?>

            </div>
            <div class="col-lg-9">
                <h1 class="my-4">Perfil Personal</h1>
                <hr  style="height:1px;border:none;color:#333;background-color:#333;">
                <h3>Nom: <?= $user->getUsername() ?></h3>

                <h4>Email: <em><?= $user->getMail() ?>.</em></h4>
                <p>Id del usuari: <?= $user->getId() ?></p>

                    <h4 class="border-dark my-4">Has oblidat la teua contrssenya? </h4>
                    <a  class="btn btn-danger text-center" href="/users/<?=$user->getId() ?>/check">Canvia la teua contrssenya</a>
                <a  class="btn btn-warning text-center" href="/users/<?=$user->getId() ?>/edit">Modifica el teu perfil</a>





            </div>
        <?php else :?>
            <?php foreach ($errors as $error) : ?>
                <h3><?= $error ?></h3>
            <?php endforeach; ?>
        <?php endif ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->