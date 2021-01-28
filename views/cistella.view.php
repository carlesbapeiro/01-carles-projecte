<div class="container">
    <br>
    <br>
    <div class="row">
        <?php use App\Core\App;
        use App\Entity\Producte;


        if (empty($message = App::get("flash")::get("message"))){
            $contador = 0;
            foreach ($cistellaProductes as $producte){
$contador++;
                ?>



                <div class="col-lg-9">
                    <h3 class="mt-2 bg-dark text-white">Producte <?=$contador?></h3>
                    <hr  style="height:1px;border:none;color:#333;background-color:#333;">
                    <h4>Nom: <?=  $producte->getNom() ?></h4><small>Categoria: <?= $producte->getCategoriaId() ?></small>
                    <p><?=  $producte->getDescripcio() ?></p>
                    <h6><em> Preu: <?= $producte->getPreu() ?></em></h6>
                </div>
                <div class="col my-5">

                    <?= generar_imagen_local('/'. Producte::POSTER_PATH, $producte->getPoster(),
                        $producte->getNom(), "w-100") ?>

                </div>
        <?php

        }

            ?>



        <?php

        }else{
            ?>

            <h2 class="text-center"><?= $message?></h2>
        <?php

        } ?>







    </div>
</div>