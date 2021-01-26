<div class="container">
    <h2 class="titol-producte">PRODUCTES</h2>
    <hr  style="height:1px;border:none;color:#333;background-color:#333;">
    <div class="row">

        <?php use App\Entity\Producte;

        foreach ($productes as $producte): ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">

                    <a href=""><?= generar_imagen_local(Producte::POSTER_PATH.'/', $producte->getPoster(),$producte->getNom() ,"card-img-top", 200) ?></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="<?php ?>"><?= $producte->getNom() ?></a>
                        </h4>
                        <p class="card-text"><em><?= $producte->getPreu() ?></em></p>
                        <hr  style="height:1px;border:none;color:#333;background-color:#333;">
                        <p class="card-text text-muted"><?= $producte->getDescripcio() ?></p>
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

                        ?>

                        <p class="card-text text-muted">Venedor: <?= $producte->getUsuariId() ?></p>


                    </div>

                </div>
            </div>
        <?php endforeach; ?>


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
            <a class="registrar-enllas" href="#">
                REGISTRA'T!!
            </a>
        </div>
    </div>
</div>
