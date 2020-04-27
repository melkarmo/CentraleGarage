<?php require('view/header.php'); ?>

<h2>Créer un nouveau client</h2>

<section>    
  <form action="index.php?entity=client&amp;action=createClient" method="post">

      <label for="nom">Nom</label>
      <input type="text" class="form-control" name="nom" id="nom" required maxlength="45" /><br />

      <label for="prenom">Prénom</label>
      <input type="text" class="form-control"  name="prenom" id="prenom" required maxlength="45" /><br />

      <label for="commune">Commune</label>
      <select class="form-control" name="commune" id="commune" required>
      <?php
      while ($commune = $communes->fetch())
      {
      ?>
        <option value="<?php echo $commune['idcommune']; ?>"><?php echo htmlspecialchars($commune['nom']) ?></option>
      <?php
      }
      $communes->closeCursor();
      ?>
      </select><br />

      <label for="responsable">Responsable</label>
      <select class="form-control" name="responsable" id="responsable" required>
      <?php
      while ($employe = $employes->fetch())
      {
      ?>
        <option value="<?php echo $employe['idemploye']; ?>"><?php echo htmlspecialchars($employe['nom']) . ' ' . htmlspecialchars($employe['prenom']) ?></option>
      <?php
      }
      $employes->closeCursor();
      ?>
      </select><br />

      <button type="submit" class="btn btn-primary">Créer le client</button>

  </form>
</section>

<?php require('view/footer.php'); ?>