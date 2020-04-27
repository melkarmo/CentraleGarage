<?php require('view/header.php'); ?>

<h2>Modifier un client</h2>

<section>
  <form action="index.php?entity=client&amp;action=updateClient" method="post">

      <label for="idclient">ID</label>
      <input type="text" class="form-control" name="idclient" id="idclient" value="<?php echo $_GET['id'] ?>" readonly /><br />

      <label for="nom">Nom</label>
      <input type="text" class="form-control" name="nom" id="nom" value="<?php echo htmlspecialchars($client['nom']) ?>" required maxlength="45" /><br />
      
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo htmlspecialchars($client['prenom']) ?>" required maxlength="45" /><br />
      
      <label for="commune">Commune</label>
      <select class="form-control" name="commune" id="commune" required>
      <?php
      while ($commune = $communes->fetch())
      {
      ?>
        <option value="<?php echo $commune['idcommune']; ?>" 
                <?php if ($commune['idcommune'] == $client['commune']) { echo 'selected'; } ?>
                ><?php echo htmlspecialchars($commune['nom']) ?></option>
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
        <option value="<?php echo $employe['idemploye']; ?>" 
                <?php if ($employe['idemploye'] == $client['responsable']) { echo 'selected'; } ?>
                ><?php echo htmlspecialchars($employe['nom']) . ' ' . htmlspecialchars($employe['prenom']) ?></option>
      <?php
      }
      $employes->closeCursor();
      ?>
      </select><br />

      <button type="submit" class="btn btn-primary">Enregistrer</button>

  </form>
</section>

<?php require('view/footer.php'); ?>