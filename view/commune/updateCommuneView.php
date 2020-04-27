<?php require('view/header.php'); ?>

<h2>Modifier une commune</h2>

<section>
  <form action="index.php?entity=commune&amp;action=updateCommune" method="post">

    <label for="idcommune">ID</label>
    <input type="text" class="form-control" name="idcommune" id="idcommune" value="<?php echo $commune['idcommune'] ?>" readonly /><br />

    <label for="nom">Nom</label>
    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo htmlspecialchars($commune['nom']) ?>" required maxlength="45" /><br />
    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    
  </form>
</section>

<?php require('view/footer.php'); ?>