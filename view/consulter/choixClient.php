<?php require('view/header.php'); ?>

<h2>Choisissez un client</h2>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro de client</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Commune</th>
				<th>Responsable</th>
				<th>Choisir</th>
			</tr>
		</thead>
		<?php
		while ($client = $clients->fetch())
		{
		?>
			<tr>
				<td><?php echo $client['idclient']; ?></td>
				<td><?php echo htmlspecialchars($client['nom']); ?></td>
				<td><?php echo htmlspecialchars($client['prenom']); ?></td>
				<td><?php echo htmlspecialchars($client['nomcommune']); ?></td>
				<td><?php echo htmlspecialchars($client['nomresponsable']) . ' ' . htmlspecialchars($client['prenomresponsable']); ?></td>
				<td><a href="index.php?consulter=client&amp;action=afficheReparations&amp;id=<?php echo $client['idclient']; ?>">Choisir</a></td>
			</tr>
		<?php
		}
		$clients->closeCursor();
		?>
	</table>

	<div style="padding: 20px">
		<a href="index.php">Retour à l'accueil</a>
	</div>
	
</section>
				
<?php require('view/footer.php'); ?>

