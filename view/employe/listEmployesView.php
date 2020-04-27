<?php require('view/header.php'); ?>

<h1>Employés</h1>

<section>

	<table class="table">
		<thead>
			<tr>
				<th>Numéro d'employé</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Nombre de réparations</th>
				<th>Modifier</th>
				<th>Supprimer</th>
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
				<td><a href="index.php?entity=employe&amp;action=updateEmployeForm&amp;id=<?php echo $employe['idemploye']; ?>">Modifier</a></td>
				<td><a href="index.php?entity=employe&amp;action=deleteEmploye&amp;id=<?php echo $employe['idemploye']; ?>" onclick="return confirm('Etes-vous sûr ?');">Supprimer</a></td>
			</tr>
		<?php
		}
		$employes->closeCursor();
		?>

	</table>

	<div style="padding: 20px">
		<a href="index.php?entity=employe&amp;action=createEmployeForm">Ajouter un nouvel employé</a>
		<span> - </span>
		<a href="index.php">Retour à l'accueil</a>
	</div>

</section>
			
<?php require('view/footer.php'); ?>

