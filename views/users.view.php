<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="<?php use App\Entity\User;

            $_SERVER["PHP_SELF"] ?>" class="form-inline  justify-content-center my-4">

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

                <div class="form-group">
                    <button class="form-control btn btn-secondary my-2 my-sm-0" type="submit" name="botonFiltrar">Search</button>
                </div>

            </form>

            <div class="text-right mb-2"><a class="btn btn-warning" href="/users/create"
                                            title="create a new user"> <i class="fa fa-plus-circle">
                    </i> New User</a>
            </div>
            <p><?php
                if(!empty($errors)){
                    foreach ($errors as $error){
                        echo $error;
                    }

                }?>
            </p>


        </div>
    </div>
    <?php if (empty($users)) : ?>
        <h3>No s'ha trobar cap element</h3>
    <?php else: ?>
        <table class="table table-condensed">
            <tr>
                <th>Foto</th>
                <th>Nom</th>
                <th>Mail</th>

                <th>Actions</th>
            </tr>

            <?php foreach ($users as $user) { ?>
                <tr>

                    <td> <?= generar_imagen_local(User::FOTO_PATH . '/', $user->getFoto(),
                            $user->getUsername(), 100, 100) ?> </td>
                    <td><?= $user->getUsername() ?></td>
                    <td><?= $user->getMail() ?></td>

                    <td style="width: 140px"><a href="/users/<?= $user->getId() ?>/edit">
                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        </a>
                        <a href="/users/<?= $user->getId() ?>/delete">
                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    <?php endif; ?>

    <!-- /.row -->
</div>