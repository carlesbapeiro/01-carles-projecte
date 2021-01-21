<form action="<?= $router->getUrl("users_update", ["id"=>$user->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$user->getId()?>">
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name"
               value="<?=$user->getUsername()?>" required>
    </div>
    <div class="form-group">
        <label for="pass">Contrassenya:</label>
        <input type="hidden" name="pass"
               value="">
        <input id="pass" class="form-control-file" type="text" name="pass"
               value="" required >

    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
