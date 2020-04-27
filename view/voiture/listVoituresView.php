<?php require('view/header.php'); ?>

<h1>Voitures</h1>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Immatriculation</th>
				<th>Marque</th>
				<th>Type</th>
				<th>Année</th>
				<th>Kilomètres</th>
				<th>Date d'arrivée</th>
				<th>Propriétaire</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<?php
		while ($voiture = $voitures->fetch())
		{
		?>
			<tr>
				<td><?php echo htmlspecialchars($voiture['immatriculation']); ?></td>
				<td><?php echo htmlspecialchars($voiture['marque']); ?></td>
				<td><?php echo htmlspecialchars($voiture['type']); ?></td>
				<td><?php echo $voiture['annee']; ?></td>
				<td><?php echo $voiture['kilometres']; ?></td>
				<td><?php echo $voiture['datearrivee']; ?></td>
				<td><?php echo htmlspecialchars($voiture['nomproprietaire']) . ' ' . htmlspecialchars($voiture['prenomproprietaire']); ?></td>
				<td><a href="index.php?entity=voiture&amp;action=updateVoitureForm&amp;id=<?php echo $voiture['idvoiture']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=voiture&amp;action=deleteVoiture&amp;id=<?php echo $voiture['idvoiture']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$voitures->closeCursor();
		?>

	</table>

	<div style="padding: 20px">
		<a href="index.php?entity=voiture&amp;action=createVoitureForm">Ajouter une nouvelle voiture</a>
		<span> - </span>
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>
