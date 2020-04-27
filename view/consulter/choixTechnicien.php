<?php require('view/header.php'); ?>

<h2>Choisissez un technicien</h2>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro d'employé</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Nombre de réparations</th>
                <th>Choisir</th>
			</tr>
		</thead>

		<?php
		while ($employe = $employes->fetch())
		{
		?>
			<tr>
				<td><?php echo $employe['idemploye']; ?></td>
				<td><?php echo htmlspecialchars($employe['nom']); ?></td>
				<td><?php echo htmlspecialchars($employe['prenom']); ?></td>
				<td><?php echo $employe['nbreparations']; ?></td>
            	<td><a href="index.php?consulter=technicien&amp;action=afficheReparations&amp;id=<?php echo $employe['idemploye']; ?>">Choisir</a></td>
			</tr>
		<?php
		}
		$employes->closeCursor();
		?>

	</table>

	<div style="padding: 20px">
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>

