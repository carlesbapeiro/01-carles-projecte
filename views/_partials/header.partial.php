<div class="container-fluid menu">
    <div class="row">

        <?php $loggedUser = $_SESSION["loggedUser"]??[];?>

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
        <?php if($loggedUser !=[]){

            ?>
            <div class="col-1" id="header-col">

                <a href="/users/<?=$loggedUser?>/edit">Perfil</a>
            </div>

            <?php

        }else{

            ?>
            <div class="col-1" id="header-col">

                <a href="/login">Perfil</a>
            </div>

            <?php

        } ?>




        <?php

        if($loggedUser != []){

            ?>

            <div class="col-1" id="header-col">

                <a href="/logout">LogOut</a>

            </div>


            <?php

        }else{
            ?>

            <div class="col-1" id="header-col">

                <a href="/login">Login</a>

            </div>
            <?php
        } ?>

    </div>
    <div class="row menu-admin" style="background-color: rgb(248, 171, 55);">

        <?php
        $rol = $_SESSION["role"]??"";

        if($rol == "ROLE_ADMIN"){

            ?>

                    <div class="col-3"></div>
                    <div class="col-2" id="header-col2">

                        <a href="/users">Gestio suaris</a>

                    </div>
                    <div class="col-2" id="header-col2">

                        <a href="/categories">Gestio Categories</a>
                    </div>
            <div class="col-2" id="header-col2">

                <a href="/productes">Gestio Productes</a>
            </div>

            <div class="col-3"></div>









            <?php
        } ?>



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