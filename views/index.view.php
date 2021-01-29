<div class="container">
    <h2 class="titol-producte">PRODUCTES</h2>
    <hr  style="height:1px;border:none;color:#333;background-color:#333;">
    <div class="row">

        <form method="post" action="<?php

        $_SERVER["PHP_SELF"] ?>"
              class="form-inline  justify-content-center my-4">

            <div class="form-group">
                <input name="text" class="form-control mr-sm-4"
                       value="<?= ($_POST["text"]) ?? "" ?>"
                       type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="optradio" id="nom" value="nom" checked>&nbsp;Nom                       &nbsp;
                </label>
            </div>

            <div class="form-check-inline">
                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="optradio" id="descripcio" value="descripcio">&nbsp;Descripcio                       &nbsp;
                </label></div>

            <div class="form-check-inline">


                <label class="form-check-inline">
                    <input class="form-check-input" type="radio" name="optradio" id="cat" value="cat">&nbsp;Categoria:                         &nbsp;
                </label>
                <select name="catsel" id="catsel">
                    <!--<option value="1" selected>Categories</option>-->
                    <?php foreach ($categories as $categoria){
                        ?>

                        <option value="<?=$categoria->getId() ?>"> <?= $categoria->getNom() ?></option>
                        <?php

                    }
                    ?>

                </select>

            </div>
            <div class="form-group">
                <button class="form-control btn btn-secondary my-2 my-sm-0" type="submit" name="botonFiltrar">Search</button>
            </div>
        </form>
        <p class="text-center text-light bg-dark"><?php
            if(!empty($errors)){
                foreach ($errors as $error){
                    echo $error;
                }

            }?>
        </p>

        <?php use App\Entity\Producte;

        foreach ($productes as $producte): ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">

                    <a href="/productes/<?=$producte->getId() ?>/show"><?= generar_imagen_local(Producte::POSTER_PATH.'/', $producte->getPoster(),$producte->getNom() ,"card-img-top", 200) ?></a>
                    <div class="card-body">
                        <h4 class="card-title text-center">
                            <a class=" text-uppercase" href="<?php ?>"><?= $producte->getNom() ?></a>
                        </h4>

                        <hr  style="height:1px;border:none;color:#333;background-color:#333;">
                        <p class="text-muted"><?= $producte->getDescripcio() ?></p>
                        <?php
                        //Revisar per gestionar

                        /*foreach ($allUser as $usuaris){
                            $id = $usuaris ->getId();
                            $usuari_id = $producte->getUsuariId();
                            if($usuari_id == $id) {

                                $nom = $usuaris->getUsername();

                                //break per a ixir del bucle
                                break;
                            }else{

                                $nom = "undefined";
                            }


                        }*/
                        //TODO:MOSTRAR EL NOM DEL VENEDOR NO NOMES EL ID
                        ?>

                        <p class=""><em>Preu: <?= $producte->getPreu() ?></em></p>



                    </div>
                    <a href="/productes/<?=$producte->getId() ?>/show" class="btn btn-info mx-1 my-1">Veure mes informacio</a>
                </div>

            </div>
        <?php endforeach; ?>


    </div>
</div>
<div class="container">

    <div class="row my-3">
        <div class="col6"></div>
        <div class="col-3">
        <nav aria-label="form-group">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previ</span>
                    </a>
                </li>

                <?php

                for ($i = 1; $i<= $paginesTotals; $i++ ){

                    ?>
                    <li class="page-item"><a class="page-link" <a href="<?=$router->getUrl("index", ["page"=>$i]) ?>"><?=$i ?></a></li>

                <?php
                } ?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Seguent</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
        <div class="col6"></div>
    </div>
</div>



<div class="container">
    <div class="row">

        <div class="col-10 text-content-container">

            <p class="text-content">Busca'ns en les nostres oficines en Pego-Alacant. Done'm suport des dels
                xicotets empresaris fins
                a les grans empreses. Les nostres compres segures amb AgrowPay, t'aseguren un seguiment del teu
                paquet
                en tot moment així com l'assegurança de que arribara sense danys.

                <br><br>
                Forma part de la nostra comunitat que ja ha augmentat a 2000 persones arreu d'espanya.
            </p>


        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-12 registrar-container">
            <a class="registrar-enllas" href="/users/create">
                REGISTRA'T!!
            </a>
        </div>
    </div>
</div>

