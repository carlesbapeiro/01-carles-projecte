<div class="container">
    <hr>
    <div class="row">
        <div class=" my-5">
            <h3>Nom de la categoria: <?= $categoria->getNom() ?></h3>

        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<form action="<?=$router->getUrl("categories_destroy") ?>" method="post" novalidate>
    <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
    <div class="form-group text-left">

        <h4>¿Estas segur  de que vols borrar la categoria:  " <?= $categoria->getNom() ?> "?</h4>
        <button type="submit" name="userAnswer" value="yes" class="btn btn-danger btn-lg">Yes</button>
        <button type="submit" name="userAnswer" value="no" class="btn btn-info btn-lg">No</button>
    </div>
</form>
<br><br>