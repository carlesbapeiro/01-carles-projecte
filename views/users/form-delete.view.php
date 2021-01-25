<h3>Name: <?= $user->getUsername() ?></h3>


<form action="<?=$router->getUrl("users_destroy") ?>" method="post" enctype="multipart/form-data" novalidate>
    <input type="hidden" name="id" value="<?= $user->getId() ?>">

    <p>Tambe borraras tots els productes que tenen associats el seguent compte:</p>
    <ul>
        <?php foreach ($productesAssociats as $producte){

            ?>

            <li><?=$producte->getNom() ?></li>


            <?php
        } ?>
    </ul>
    <div class="form-group text-left">
        <h4>Your partner <?= $user->getUsername()?> is going to be deleted. Are you sure?</h4>
        <input type="submit" name="userAnswer" value="yes"  class="btn btn-danger btn-lg" />
        <input type="submit" name="userAnswer" value="no"  class="btn btn-info btn-lg" />
    </div>
</form>