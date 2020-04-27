<?php require('view/header.php'); ?>

<h1>Forfaits</h1>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<?php
		while ($forfait = $forfaits->fetch())
		{
		?>
		   <tr>
				<td><?php echo htmlspecialchars($forfait['description']); ?><br />
				<td><?php echo $forfait['prix']; ?><br />
				<td><a href="index.php?entity=forfait&amp;action=updateForfaitForm&amp;id=<?php echo $forfait['idforfait']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=forfait&amp;action=deleteForfait&amp;id=<?php echo $forfait['idforfait']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$forfaits->closeCursor();
		?>
		</table>

		<div style="padding: 20px">
			<a href="index.php?entity=forfait&amp;action=createForfaitForm">Ajouter un nouveau forfait</a>
			<span> - </span>
			<a href="index.php">Retour à l'accueil</a>
		</div>

</section>

<?php require('view/footer.php'); ?>
