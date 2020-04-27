<?php require('view/header.php'); ?>

<h2>Modifier une voiture</h2>

<section>
    <form action="index.php?entity=voiture&amp;action=updateVoiture" method="post">

        <label for="idvoiture">ID</label>
        <input type="text" class="form-control" name="idvoiture" id="idvoiture" value="<?php echo $_GET['id'] ?>" readonly /><br />
        
        <label for="immatriculation">Immatriculation</label>
        <input type="text" class="form-control" name="immatriculation" id="immatriculation" value="<?php echo htmlspecialchars($voiture['immatriculation']) ?>" required maxlength="20" /><br />
        
        <label for="marque">Marque</label>
        <input type="text" class="form-control" name="marque" id="marque" value="<?php echo htmlspecialchars($voiture['marque']) ?>" required maxlength="45" /><br />
        
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" value="<?php echo htmlspecialchars($voiture['type']) ?>" required maxlength="45" /><br />
        
        <label for="annee">Année</label>
        <input type="number" class="form-control" name="annee" id="annee" min="0" max="9999" value="<?php echo $voiture['annee'] ?>" required /><br />
        
        <label for="kilometres">Kilomètres</label>
        <input type="number" class="form-control" name="kilometres" id="kilometres" min="0" max="999999" value="<?php echo $voiture['kilometres'] ?>" required /><br />

        <label for="proprietaire">Propriétaire</label>
        <select class="form-control" name="proprietaire" id="proprietaire" required>
        <?php
        while ($client = $clients->fetch())
        {
        ?>
          <option value="<?php echo $client['idclient']; ?>" 
                  <?php if ($client['idclient'] == $voiture['proprietaire']) { echo 'selected'; } ?>
                  ><?php echo htmlspecialchars($client['nom']) . ' ' . htmlspecialchars($client['prenom']) ?></option>
        <?php
        }
        $clients->closeCursor();
        ?>
        </select><br />

        <button type="submit" class="btn btn-primary">Enregistrer</button>

  </form>
</section>

<?php require('view/footer.php'); ?>