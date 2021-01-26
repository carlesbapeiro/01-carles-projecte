<h3 class="text-center">Formulari de canvi de contrassenya</h3>

<form action="<?= $router->getUrl("users_validate", ["id"=>$user->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$user->getId()?>">

    <div class="form-group">
        <label for="pass">Contrassenya actual:</label>
        <input type="hidden" name="pass"
               value="">
        <input id="pass" class="form-control-file" type="text" name="pass"
               value="" required >

        <label for="pass2">Nova contrassenya:</label>
        <input type="hidden" name="pass2"
               value="">
        <input id="pass2" class="form-control-file" type="text" name="pass2"
               value="" required >


    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
