<?php require('view/header.php'); ?>

<h2>Réparations du technicien <strong><?php echo htmlspecialchars($employe['nom']) . ' ' . htmlspecialchars($employe['prenom']); ?></strong></h2>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro de réparation</th>
				<th>Description</th>
				<th>Prix (€)</th>
				<th>Voiture</th>
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
				<td><?php echo htmlspecialchars($reparation['immatriculation']) . ' (' . htmlspecialchars($reparation['marque']) . ' ' . htmlspecialchars($reparation['type']) . ' ' . $reparation['annee'] . ')'; ?></td>
			</tr>
		<?php
		}
		$reparations->closeCursor();
		?>
	</table>

	<div style="padding: 20px">
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>

