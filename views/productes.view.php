<div class="container">

    <div class="row">

        <div class="text-right mb-3"><a class="btn btn-primary" href="/productes/create"
                                        title="create a new partner"> <i class="fa fa-plus-circle">
                </i> Nou Producte</a>
        </div>

        <p><?= $error ?? "" ?></p>
    </div>

    <table class="table table-condensed">
        <?php foreach ($productes as $producte) { ?>
            <tr>

                <td><?= $producte->getNom() ?></td>
                <td><?= $producte->getDescripcio() ?></td>
                <td><?= $producte->getPreu() ?></td>

                <td style="width: 140px"><a href="/productes/<?= $producte->getId() ?>/edit">
                        <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>






</div>

