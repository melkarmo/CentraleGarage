<?php require('view/header.php'); ?>

<h1>Clients</h1>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro de client</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Commune</th>
				<th>Responsable</th>
				<th>Modifier</th>
				<th>Supprimer</th>
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
				<td><a href="index.php?entity=client&amp;action=updateClientForm&amp;id=<?php echo $client['idclient']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=client&amp;action=deleteClient&amp;id=<?php echo $client['idclient']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$clients->closeCursor();
		?>
	</table>

	<div style="padding: 20px">
		<a href="index.php?entity=client&amp;action=createClientForm">Ajouter un nouveau client</a>
		<span> - </span>
		<a href="index.php">Retour à l'accueil</a>
	</div>
	
</section>
				
<?php require('view/footer.php'); ?>

