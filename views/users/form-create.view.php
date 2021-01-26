<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" class="form-control" type="text" name="name" required>
    </div>
    <div class="form-group">
        <label for="mail">Mail:</label>
        <input id="mail" class="form-control-file" type="text" name="mail" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input id="password" class="form-control-file" type="text" name="password" required>
    </div>
    <div class="form-group">
        <label for="foto">Foto:</label>
        <input id="foto" class="form-control" type="file" name="foto" required>
    </div>

    <?php
    $rol = $_SESSION["role"]??"";

    if($rol == "ROLE_ADMIN"){

        ?>

        <div class="form-group">
            <label for="role">Role</label>

            <select class="form-control" name="role" id="role">

                <option value="ROLE_ADMIN">Admin</option>
                <option value="ROLE_USER">User</option>

            </select>
        </div>

        <?php

    } ?>




    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
