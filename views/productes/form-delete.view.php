<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 my-4">
            <?= generar_imagen_local("/".$productePath, $producte->getPoster(),
                $producte->getNom() , "rounded w-100") ?>
        </div>
        <div class="col-lg-9 col-md-6 my-5">
            <h1><?= $producte->getNom() ?></h1>


            <h5 class="text-muted">Descripcio</h5>
            <p><?= $producte->getDescripcio() ?></p>
            <h2><em><?= $producte->getPreu() ?>.</em></h2>
            <p class="text-muted">Valoracio</p>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<form action="<?=$router->getUrl("productes_destroy") ?>" method="post" novalidate>
    <input type="hidden" name="id" value="<?= $producte->getId() ?>">
    <div class="form-group text-left">

        <h4>¿Estas seguro que quieres borrar el producto " <?= $producte->getNom() ?> "?</h4>
        <button type="submit" name="userAnswer" value="yes" class="btn btn-danger btn-lg">Yes</button>
        <button type="submit" name="userAnswer" value="no" class="btn btn-info btn-lg">No</button>
    </div>
</form>
<br><br>