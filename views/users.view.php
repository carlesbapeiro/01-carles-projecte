<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="<?php use App\Entity\User;

            $_SERVER["PHP_SELF"] ?>"

            </form>

            <div class="text-right mb-2"><a class="btn btn-warning" href="/users/create"
                                            title="create a new user"> <i class="fa fa-plus-circle">
                    </i> New User</a>
            </div>


        </div>
        <p><?= $error ?? "" ?></p>
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