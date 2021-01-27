<div class="container">
    <div class="row">
        <?php use App\Entity\Producte;


        if (empty($errors)) : ?>

            <div class="col my-5">

                <?= generar_imagen_local('/'. Producte::POSTER_PATH, $producte->getPoster(),
                    $producte->getNom(), "w-100") ?>

            </div>
            <div class="col-lg-9">
                <h1 class="my-4">Agrow - Dades del producte</h1>
                <hr  style="height:1px;border:none;color:#333;background-color:#333;">
                <h3>Nom: <?=  $producte->getNom() ?></h3><small>Categoria: <?= $producte->getCategoriaId() ?></small>

                <div class=" bg-secondary text-white"><p>Breu descripcio del anunciant:</p></div>
                <p><?=  $producte->getDescripcio() ?></p>





                <h4>Venedor: <?= $producte->getUsuariId() ?> <em>. Preu: <?= $producte->getPreu() ?></em></h4>

                <a href="/" class="my-1 btn btn-dark">Tornar enrere</a>


            </div>
        <?php else :?>
            <?php foreach ($errors as $error) : ?>
                <h3><?= $error ?></h3>
            <?php endforeach; ?>
        <?php endif ?>
    </div> <!-- /.row -->
</div> <!-- /.container -->