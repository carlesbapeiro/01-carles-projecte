
<h3 class="text-center">Dades del usuari</h3>

<form action="<?= $router->getUrl("users_update", ["id"=>$user->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$user->getId()?>">
    <div class="form-group">
        <label for="name">Usuari:</label>
        <input id="name" class="form-control" type="text" name="name"
               value="<?=$user->getUsername()?>" required>
    </div>

    <div class="form-group">
        <label for="mail">Mail:</label>
        <input id="mail" class="form-control" type="text" name="mail"
               value="<?=$user->getMail()?>" required>
    </div>

    <div class="form-group">
        <label for="foto">Foto:</label>
        <input type="hidden" name="foto" value="<?= $user->getFoto() ?>">
        <input id="foto" class="form-control" type="file" name="foto" value="<?= $user->getFoto() ?>" required>
        <small><?= $user->getFoto() ?></small>
    </div>


<!--    <div class="form-group">
        <p style="background-color: lightgrey">Has oblidat la teua contrassenya?</p>
        <label for="pass">Nova contrassenya:</label>
        <input type="hidden" name="pass"
               value="">
        <input id="pass" class="form-control-file" type="text" name="pass"
               value="" required >


    </div>-->
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
