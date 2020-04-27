<?php require('view/header.php'); ?>

<h2>Créer une nouvelle voiture</h2>

<section>    
    <form action="index.php?entity=voiture&amp;action=createVoiture" method="post">

        <label for="immatriculation">Immatriculation</label>
        <input type="text" class="form-control" name="immatriculation" id="immatriculation" required maxlength="20" /><br />

        <label for="marque">Marque</label>
        <input type="text" class="form-control" name="marque" id="marque" required maxlength="45" /><br />

        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" id="type" required maxlength="45" /><br />

        <label for="annee">Année</label>
        <input type="number" class="form-control" name="annee" id="annee" min="0" max="9999" required /><br />

        <label for="kilometres">Kilomètres</label>
        <input type="number" class="form-control" name="kilometres" id="kilometres" min="0" max="999999" required /><br />

        <label for="proprietaire">Propriétaire</label>
        <select class="form-control" name="proprietaire" id="proprietaire" required>
        <?php
        while ($client = $clients->fetch())
        {
        ?>
          <option value="<?php echo $client['idclient']; ?>"><?php echo htmlspecialchars($client['nom']) . ' ' . htmlspecialchars($client['prenom']) ?></option>
        <?php
        }
        $clients->closeCursor();
        ?>
        </select><br />

        <button type="submit" class="btn btn-primary">Créer la voiture</button>

    </form>
</section>

<?php require('view/footer.php'); ?>