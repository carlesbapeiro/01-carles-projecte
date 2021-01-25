<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?= $producte->getId() ?>">
    <input type="hidden" name="usuari_id" value="<?= $producte->getUsuariId() ?>">
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input id="nom" class="form-control" type="text" name="nom" value="<?= $producte->getNom() ?>" required>
    </div>
    <div class="form-group">
        <label for="descripcio">Descripcio:</label>
        <textarea id="descripcio" name="descripcio" class="form-control rounded-0" rows="2" ><?=$producte->getDescripcio()?></textarea>
    </div>

    <div class="form-group">
        <label for="preu">Preu</label>
        <input id="preu" class="form-control" type="number" name="preu" value="<?=$producte->getPreu()?>" required>
    </div>
    <div class="form-group">
        <label for="poster">Poster:</label>
        <input type="hidden" name="poster" value="<?= $producte->getPoster() ?>">
        <input id="poster" class="form-control" type="file" name="poster" value="<?= $producte->getPoster() ?>" required>
        <small><?= $producte->getPoster() ?></small>
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>