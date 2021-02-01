<form action="" method="post" enctype="multipart/form-data" novalidate>
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input id="nom" class="form-control" type="text" name="nom" maxlength="20" required>
    </div>
    <div class="form-group">
        <label for="descripcio">Descripcio:</label>
        <textarea id="descripcio" name="descripcio" class="form-control rounded-0" maxlength="255" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="preu">Preu:</label>
        <input id="preu" class="form-control" type="number" name="preu" required>
    </div>

    <div class="form-group">
    <p>Categoria:</p>
    <select name="categoria" id="categoria">

        <?php
        foreach ($categories as $categoria){

            ?>
            <option value="<?=$categoria->getId() ?>"><?= $categoria->getNom() ?></option>
            <?php
        }
        ?>


    </select>
    </div>
    <div class="form-group">
        <label for="poster">Poster:</label>
        <input id="poster" class="form-control" type="file" name="poster" required>
    </div>

    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>