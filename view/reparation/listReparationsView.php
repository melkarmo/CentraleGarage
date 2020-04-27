<?php require('view/header.php'); ?>

<h1>Réparations</h1>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro de réparation</th>
				<th>Description</th>
				<th>Prix (€)</th>
				<th>Technicien</th>
				<th>Voiture</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<?php
		while ($reparation = $reparations->fetch())
		{
		?>
			<tr>
				<td><?php echo $reparation['idreparation']; ?></td>
				<td><?php echo htmlspecialchars($reparation['description']); ?></td>
				<td><?php echo $reparation['prix']; ?></td>
				<td><?php echo htmlspecialchars($reparation['nomtechnicien']) . ' ' . htmlspecialchars($reparation['prenomtechnicien']); ?></td>
				<td><?php echo htmlspecialchars($reparation['immatriculation']) . ' (' . htmlspecialchars($reparation['marque']) . ' ' . htmlspecialchars($reparation['type']) . ' ' . $reparation['annee'] . ')'; ?></td>
				<td><a href="index.php?entity=reparation&amp;action=updateReparationForm&amp;id=<?php echo $reparation['idreparation']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=reparation&amp;action=deleteReparation&amp;id=<?php echo $reparation['idreparation']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$reparations->closeCursor();
		?>
	</table>

	<div style="padding: 20px">
		<a href="index.php?entity=reparation&amp;action=createReparationForm">Ajouter une nouvelle réparation</a>
		<span> - </span>
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>

