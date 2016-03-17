<?php $this->_tpl_include('header.html'); ?>
<?php
$id_demandeur = $_SESSION['id_demandeur'];

  $nbBordereau = countBoredereau($id_demandeur);
 
  for($i=1;$i<=$nbBordereau['nb'];$i++){
   echo '<a href="#">'.$i.'</a>';
  }
?>

<div id="bordereau">
	<div class="bordereau_menu">
		 <table border=2>
   <tr>
       <th>Date</th>
       <th>Motif</th>
       <th>Trajet</th>
       <th>Km parcourus</th>
       <th>Cout Trajet</th>
       <th>Péages</th>
       <th>Repas</th>
       <th>Hebergement</th>
       <th>Total</th>
       <th>Modifier</th>
       <th>Supprimer</th>
   </tr>
   <tr>
<?php 

   $rows = lireLigneDeFrais($id_demandeur);

foreach($rows as $row){
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['libelle']."</td>";
    echo "<td>".$row['trajet']."</td>";
    echo "<td>".$row['km']."</td>";
    echo "<td>".$row['coutTrajet']."</td>";
    echo "<td>".$row['coutPeage']."</td>";
    echo "<td>".$row['coutRepas']."</td>";
    echo "<td>".$row['coutHebergement']."</td>";
    echo "<td>".$row['coutTotal']."</td>";
	echo "<td><a href=''><img src='img/crayon.ico' alt='Photo de montagne' width=24 height=24/></a></td>";	
	echo "<td><a href=''><img src='img/poubelle.png' alt='Photo de montagne' width=24 height=24/></a></td>";

   echo"</tr>";
}  
?>

</table>

<?php $total = countCoutTotal($id_demandeur); 
      echo "Le montant total est de : ".$total['total'];  // affiche le total du total du tableau 
?>
		
<p><a href="Saisit_Note_Frait.php">Ajouter</a> une lignes de frais</p>  <!--lien vers la page ajouter -->
		

		


	</div>

	<div class="borderau_contenu">

	</div>

</div>




<?php $this->_tpl_include('footer.html'); ?>