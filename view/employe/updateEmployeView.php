<?php require('view/header.php'); ?>

<h2>Modifier un employé</h2>

<section>
    <form action="index.php?entity=employe&amp;action=updateEmploye" method="post">

        <label for="idemploye">ID</label>
        <input type="text" class="form-control" name="idemploye" id="idemploye" value="<?php echo $_GET['id'] ?>" readonly /><br />

        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?php echo htmlspecialchars($employe['nom']) ?>" required maxlength="45" /><br />

        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo htmlspecialchars($employe['prenom']) ?>" required maxlength="45" /><br />

        <button type="submit" class="btn btn-primary">Enregistrer</button>

  </form>
</section>

<?php require('view/footer.php'); ?>