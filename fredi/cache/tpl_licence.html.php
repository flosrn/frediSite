<?php $this->_tpl_include('header.html'); ?>
<?php $id_demandeur = $_SESSION['id_demandeur']; ?>
<p>Mes licences</p>

<table border=2>
	<tr>
		<th>Numéro de licence</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Date de naissance</th>
		<th>Club</th>	
		<th>Modifier</th>	
		<th>Supprimer</th>	
	</tr>
	<tr>
<?php 
	$rows = mesAdherents($id_demandeur);
	
	foreach($rows as $row)
	{
		echo "<td>".$row['numLicence']."</td>";	

		echo "<td>".$row['Nom']."</td>";	
		echo "<td>".$row['Prenom']."</td>";	
		echo "<td>".$row['dateNaissance']."</td>";	
		echo "<td>".$row['nomClub']."</td>";

		echo "<td><a href='modifierLicence.php?num=".$row['id']."'><img src='img/crayon.ico' alt='Photo de montagne' width=24 height=24/></a></td>";	
		echo "<td><a href='supprimerLicence.php?num=".$row['id']."'><img src='img/poubelle.png' alt='Photo de montagne' width=24 height=24/></a></td>";
		echo "</tr>";
	}
?>
	
</table>
	
<a href="ajouter_licence.php"><button onclick="newBordereau">Ajouter un adherent</button></a>


<?php  $this->_tpl_include('footer.html'); ?>
