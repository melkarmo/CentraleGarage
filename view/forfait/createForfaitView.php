<?php require('view/header.php'); ?>

<h2>Créer un nouveau forfait</h2>

<section> 
    <form action="index.php?entity=forfait&amp;action=createForfait" method="post">

			<label for="description">Description</label>
      <input type="text" class="form-control" name="description" id="description" required maxlength="255" /><br />

      <label for="prix">Prix</label>
      <input type="number" class="form-control" name="prix" id="prix" min="0" max="999999" required /><br />

			<button type="submit" class="btn btn-primary">Créer le forfait</button>
    
    </form>
</section>

<?php require('view/footer.php'); ?>