<?php

?>
<div class="container">

    <div class="row">

        <form method="post" action="<?php use App\Entity\Producte;

        $_SERVER["PHP_SELF"] ?>"
              class="form-inline  justify-content-center my-4">



            <div class="form-group">
                <input name="text" class="form-control mr-sm-4"
                       value="<?= ($_POST["text"]) ?? "" ?>"
                       type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="optradio" id="nom" value="nom">&nbsp;Nom                       &nbsp;
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="optradio" id="preu" value="preu">&nbsp;Preu                        &nbsp;
                </label></div>
            <div class="form-check-inline">
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="optradio" id="both" value="both" checked>&nbsp;both                        &nbsp;
                </label>
            </div>
            <div class="form-group">
                <button class="form-control btn btn-secondary my-2 my-sm-0" type="submit" name="botonFiltrar">Search</button>
            </div>
        </form>

        <div class="text-right mb-3"><a class="btn btn-primary" href="/productes/create"
                                        title="create a new partner"> <i class="fa fa-plus-circle">
                </i> Nou Producte</a>
        </div>

        <p><?= $error ?? "" ?></p>
    </div>

    <table class="table table-condensed">

        <tr>
            <th>Poster</th>
            <th>Nom <a href="/movies?order=title&&tipo=ASC""><i
                        class="fa fa-arrow-down"></i></a>
                <a href="/movies?order=title&&tipo=DESC"><i
                            class="fa fa-arrow-up"></i></a></th>
            <th>Descripcio</th>
            <th>Preu</th>
            <th>Actions</th>
        </tr>

  <!--      <?php
/*        $messageUser = $messageUser??"";
        if($messageUser == ""){

            */?>

            <h6 class="alert-success"> Benvingut!</h6>

        <?php /*}else{ */?>
            <h6 class="alert-success"> Benvingut usuari amb id:  <?/*= $messageUser */?>!</h6>
        --><?php /*}*/?>
        <?php foreach ($productes as $producte) { ?>
            <tr>
                <td> <?= generar_imagen_local(Producte::POSTER_PATH . '/', $producte->getPoster(),
                        $producte->getNom(), 200, 100) ?> </td>
                <td><?= $producte->getNom() ?></td>
                <td><?= $producte->getDescripcio() ?></td>
                <td><?= $producte->getPreu() ?></td>

                <td style="width: 140px"><a href="/productes/<?= $producte->getId() ?>/edit">
                        <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    </a>
                    <a href="<?=$router->getUrl("productes_delete", ["id"=>$producte->getId()]) ?>">
                        <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>






</div>

