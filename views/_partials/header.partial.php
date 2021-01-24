<div class="container-fluid menu">
    <div class="row">

        <div class="col-2 logoCont">

            <a href="/"><img class="logo" src="/images/imgHome/AGROW-logo/agrow-blanco-amarillo (1).png"></a>

        </div>
        <div class="col-1">

        </div>
        <div class="col-1" id="header-col">

            <a href="/">Inici</a>

        </div>
        <div class="col-1" id="header-col">

            <a href="/productes">Productes</a>
        </div>

        <?php
        $loggedUser = $_SESSION["loggedUser"]??[];
        if($loggedUser != []){

            ?>
            <div class="col-1" id="header-col">

                <a href="/logout">Log Out</a>

            </div>

            <?php

        }else{
            ?>

            <div class="col-1" id="header-col">

                <a href="/login">Login</a>

            </div>
            <?php
        } ?>

        <div class="col-1" id="header-col">

            <a href="/users">Usuaris</a>

        </div>
        <div class="col-1" id="header-col">

            <a href="#">Envios</a>

        </div>


    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="separador">

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="separador">

            </div>
        </div>
    </div>
</div>