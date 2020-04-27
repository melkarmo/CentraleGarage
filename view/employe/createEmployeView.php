<?php require('view/header.php'); ?>

<h2>Créer un nouvel employé</h2>

<section>    
  <form action="index.php?entity=employe&amp;action=createEmploye" method="post">

      <label for="nom">Nom</label>
      <input type="text" class="form-control" name="nom" id="nom" required maxlength="45" /><br />

      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" name="prenom" id="prenom" required maxlength="45" /><br />

      <button type="submit" class="btn btn-primary">Créer l'employé</button>

  </form>
</section>

<?php require('view/footer.php'); ?>