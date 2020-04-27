<?php require('view/header.php'); ?>

<h2>Modifier un forfait</h2>

<section>
    <form action="index.php?entity=forfait&amp;action=updateForfait" method="post">

        <label for="idforfait">ID</label>
        <input class="form-control" type="text" name="idforfait" id="idforfait" value="<?php echo $forfait['idforfait'] ?>" readonly /><br />
        
        <label for="description">Description</label>
        <input class="form-control" type="text" name="description" id="description" value="<?php echo htmlspecialchars($forfait['description']) ?>" required maxlength="255" /><br />
        
        <label for="prix">Prix</label>
        <input class="form-control" type="number" name="prix" id="prix" min="0" max="999999" value="<?php echo $forfait['prix'] ?>" required /><br />

        <button type="submit" class="btn btn-primary">Enregistrer</button>

  </form>
</section>

<?php require('view/footer.php'); ?>