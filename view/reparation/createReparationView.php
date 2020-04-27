<?php require('view/header.php'); ?>

<h2>Créer une nouvelle réparation</h2>

<section>    
    <form action="index.php?entity=reparation&amp;action=createReparation" method="post">

      <label id="labelchoixForfait" for="choixForfait"><i>Réparation par forfait</i></label>
      <input type="checkbox" name="choixForfait" id="choixForfait" onclick="onChange()" /><br />

      <div style="padding: 30px;">
        <label id="labelDescription" for="description">Description</label>
        <input type="text" class="form-control" name="description" id="description" required maxlength="255" /><br />

        <label id="labelPrix" for="prix">Prix</label>
        <input type="number" class="form-control" name="prix" id="prix" min="0" max="999999" required /><br />

        <label id="labelForfait" for="forfait" hidden>Forfait</label>
        <select class="form-control" name="forfait" id="forfait" hidden>
        <?php
        while ($forfait = $forfaits->fetch())
        {
        ?>
          <option value="<?php echo $forfait['idforfait']; ?>"><?php echo htmlspecialchars($forfait['description']) . ' -  ' . $forfait['prix'] . ' €' ?></option>
        <?php
        }
        $forfaits->closeCursor();
        ?>
        </select><br />
      </div>

      <label for="technicien">Technicien</label>
      <select class="form-control" name="technicien" id="technicien" required>
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

      <label for="voiture">Voiture</label>
      <select class="form-control" name="voiture" id="voiture" required>
      <?php
      while ($voiture = $voitures->fetch())
      {
      ?>
        <option value="<?php echo $voiture['idvoiture']; ?>"><?php echo htmlspecialchars($voiture['immatriculation']) . ' (' . htmlspecialchars($voiture['marque']) . ' ' . htmlspecialchars($voiture['type']) . ' ' . $voiture['annee'] . ')'; ?></option>
      <?php
      }
      $voitures->closeCursor();
      ?>
      </select><br />

    <button type="submit" class="btn btn-primary">Créer la réparation</button>

    </form>
</section>

<script>
  function onChange() {
    var checkBox = document.getElementById("choixForfait");
    var description = document.getElementById("description"); var labelDescription = document.getElementById("labelDescription"); 
    var prix = document.getElementById("prix"); var labelPrix = document.getElementById("labelPrix"); 
    var forfait = document.getElementById("forfait"); var labelForfait = document.getElementById("labelForfait"); 
    if (checkBox.checked == true){
      forfait.hidden = false; forfait.required = true; labelForfait.hidden = false;
      description.hidden = true; description.required = false; labelDescription.hidden = true;
      prix.hidden = true; prix.required = false; labelPrix.hidden = true;
    } else {
      forfait.hidden = true; forfait.required = false; labelForfait.hidden = true;
      description.hidden = false; description.required = true; labelDescription.hidden = false;
      prix.hidden = false; prix.required = true; labelPrix.hidden = false;
    }
  } 
</script>

<?php require('view/footer.php'); ?>