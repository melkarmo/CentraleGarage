<?php require('view/header.php'); ?>

<h1>Communes</h1>

<section>

	<table class="table">

		<thead>
			<tr>
				<th>Nom</th>
				<th>Nombre de clients</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		
		<?php
		while ($commune = $communes->fetch())
		{
		?>
			<tr>
				<td><?php echo htmlspecialchars($commune['nom']); ?></td>
				<td><?php echo $commune['nbclients']; ?></td>
				<td><a href="index.php?entity=commune&amp;action=updateCommuneForm&amp;id=<?php echo $commune['idcommune']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=commune&amp;action=deleteCommune&amp;id=<?php echo $commune['idcommune']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$communes->closeCursor();
		?>

	</table>

	<div style="padding: 20px">
		<a href="index.php?entity=commune&amp;action=createCommuneForm">Ajouter une nouvelle commune</a>
		<span> - </span>
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>
