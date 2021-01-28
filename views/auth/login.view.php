<?php

use App\Core\App;

?>
<div class="container" >
    <div class="row">

        <div class="col-sm-6 text-center">
            <h3>No tens un compte?</h3>
            <br>
            <a href="users/create" class="btn btn-info">Registra't!</a>
        </div>
        <div class="col-sm-6">

            <h3>Login</h3>
            <p><?= $message = App::get("flash")::get("message")??""; ?></p>
            <form method="post" novalidate>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control"
                           name="nom" id="nom"
                           value="<?= null ?? "" ?>"
                           placeholder="nom" required>
                </div>
                <div class="form-group">
                    <label for="password">Contrassenya</label>
                    <input type="password" class="form-control"
                           name="password" id="password"
                           value="<?= null ?? "" ?>"
                           placeholder="Password" required>
                </div>
                <input type="submit" class="btn btn-dark" value="Login">
            </form>
        </div>

    </div>
</div>