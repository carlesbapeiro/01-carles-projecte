<form action="<?= $router->getUrl("categories_update", ["id"=>$categoria->getId()]); ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?=$categoria->getId()?>">
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input id="nom" class="form-control" type="text" name="nom" maxlength="20"
               value="<?=$categoria->getNom()?>" required>
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
