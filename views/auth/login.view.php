<div class="container" >
    <div class="row">

        <div class="col-sm-6 text-center">
            <h3>No tens un compte?</h3>
            <br>
            <a href="users/create" class="btn btn-info">Registra't!</a>
        </div>
        <div class="col-sm-6">
            <?php //TODO: Gestionar el error de si no fiques res ?>
            <h3>Login</h3>
            <form method="post" novalidate>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control"
                           name="username" id="username"
                           value="<?= null ?? "" ?>"
                           placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control"
                           name="password" id="password"
                           value="<?= null ?? "" ?>"
                           placeholder="Password" required>
                </div>
                <input type="submit" class="btn btn-dark" value="Login">
            </form>
        </div>

    </div>
</div>