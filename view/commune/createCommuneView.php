<?php require('view/header.php'); ?>

<h2>Créer une nouvelle commune</h2>

<section>  
    <form action="index.php?entity=commune&amp;action=createCommune" method="post">

			<label for="nom">Nom</label>
      <input type="text" class="form-control" name="nom" id="nom" required maxlength="45" /><br />

			<button type="submit" class="btn btn-primary">Créer la commune</button>

    </form>
</section>

<?php require('view/footer.php'); ?>