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
		echo "<td>".$row['nom']."</td>";	
		echo "<td>".$row['prenom']."</td>";	
		echo "<td>".$row['dateNaissance']."</td>";	
		echo "<td>".$row['Nom']."</td>";
		echo "<td><a href='modifier.php?num=".$row['numLicence']."'><img src='img/crayon.ico' alt='Photo de montagne' width=24 height=24/></a></td>";	
		echo "<td><a href='supprimer.php?num=".$row['numLicence']."'><img src='img/poubelle.png' alt='Photo de montagne' width=24 height=24/></a></td>";
		echo "</tr>";
	}
?>
	
</table>
	



<?php  $this->_tpl_include('footer.html'); ?>