<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-6 my-5">
            <h1><?= $categoria->getNom() ?></h1>

        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
<form action="<?=$router->getUrl("categories_destroy") ?>" method="post" novalidate>
    <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
    <div class="form-group text-left">

        <h4>¿Estas seguro que quieres borrar el producto " <?= $producte->getNom() ?> "?</h4>
        <button type="submit" name="userAnswer" value="yes" class="btn btn-danger btn-lg">Yes</button>
        <button type="submit" name="userAnswer" value="no" class="btn btn-info btn-lg">No</button>
    </div>
</form>
<br><br>