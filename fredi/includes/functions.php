<?php
include ('db_con.php');

function page_header($page_title='', $subtitle='', $page_code='HOME')
{
	global $template, $config;
	
	$template->assign_vars(array(
		'S_USER_LANG'	=> 'fr',
		'S_CONTENT_ENCODING'	=> 'iso-8859-15',
		'SITENAME'	=> '/fredi/index.php',
		'PAGE_TITLE'	=> htmlentities($page_title),
		'PAGE_SUBTITLE'	=> htmlentities($subtitle),
		'MENU_LIST'	=> isset($config['MENU']) ? true : false));
	
	// ajout des liens de toutes les feuilles de style
	if(isset($config['CSS']) && is_array($config['CSS']))
	{
		foreach($config['CSS'] as $value)
			$template->assign_block_vars('addstyle', array(
				'HEAD_STYLESHEET' => $value));
	}
	
	if(isset($config['MENU']))
	{
		foreach($config['MENU'] as $key => $value)
		{
			$template->assign_block_vars('menuloop', array(
				'CURRENT'	=> ($key == $page_code),
				'TEXT'	=> htmlentities($value['TEXT']),
				'INFO'	=> htmlentities($value['INFO']),
				'U_HREF'	=> $value['HREF']));
		}
	}
		
	header('Content-type: text/html; charset=iso-8859-15');
	header('Cache-Control: private, no-cache="set-cookie"');
	header('Expires: 0');
	header('Pragma: no-cache');
}

function page_footer()
{
	global $template;
	
	$template->assign_var('C_DATE', date("d/m/Y"));
}

function login($pseudo, $mdp)
{
	$con = base();

	$sql = "select * from demandeur where AdresseMail='$pseudo' and motDePasse='$mdp'";

  try {
      $res = $con->query($sql);
      $row = $res->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  //on test la saisie

  if ($pseudo == $row['AdresseMail'] && $mdp == $row['motDePasse']) {
    $message = "<p>bravo vous etes connecter</p>";
    $_SESSION['AdresseMail'] = $row['AdresseMail'];
    $_SESSION['id_demandeur'] = $row['idDemandeur'];

		$_SESSION['connecter'] = 1 ;
	} else {
		$message = "<p>Login ou mot de passe incorrecte</p>";
		$_SESSION['connecter'] = 0; 
	}
echo $message;
}

function inscription ()
{
	$con = base();
	$message = "";

		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$rue = $_POST['rue'];
		$CP = $_POST['CP'];
		$ville = $_POST['ville'];
	  $mail = $_POST['mail'];
	  $mdp = sha1($_POST['mdp']);
	  $test = "select * from demandeur";

	  try {
	      $restest = $con->query($test);
	      $rows = $restest->fetch(PDO::FETCH_ASSOC);
	  } catch (PDOException $e) {
	      die("Erreur lors de la requête SQL: " . $e->getMessage());
	  }
		$exists=0;
	  while($rows = $restest->fetch(PDO::FETCH_ASSOC)) {
	      if(($mail == $rows['AdresseMail'])) {
	          $exists = 1;
	          break;
	      }
	  }

	  if($exists != 1) {
	      //On insère les données dans la table à travers une requête SQL
	      $sql = "INSERT INTO demandeur(Nom, Prenom, Rue, CP, Ville, AdresseMail, motDePasse)
	                  VALUES ('$nom', '$prenom', '$rue', '$CP', '$ville', '$mail', '$mdp')";
	      try {
	          $con->exec($sql);
	          $message = $_POST['nom'] . " votre inscription a bien été prise en compte!";
	      } catch (PDOException $e) {
	          die("Erreur lors de la requête SQL: " . $e->getMessage());
	      }
	  }
	  else {
	      $message = "Cette adresse mail est déja utilisée";
	  }
	  echo $message;
}

function insertLigneDeFrait($noteDeFrais, $id_demandeur){

	$con = base();	
       
        $sql = "insert into ligneFrais (date, trajet, km, coutTrajet, coutPeage, coutRepas, coutHebergement, coutTotal, idDemandeur, Annee, idMotif) 
        values ('".$noteDeFrais->date."', '".$noteDeFrais->trajet."', ".$noteDeFrais->km.", ".$noteDeFrais->coutTrajet.", ".$noteDeFrais->coutPeage.", ".$noteDeFrais->coutRepas.", ".$noteDeFrais->coutHebergement.", ".$noteDeFrais->coutTotal.", ".$id_demandeur.", ".$noteDeFrais->annee.", ".$noteDeFrais->idMotif.")";

        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }
}

function insertMotif($motif){
	$con = base();

	$sql = "insert into motif (libelle) 
        values ('".$motif->libelle."')";
        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }

}

function idMotif($libelle)
{
	$con = base();

	$sql = "select * from motif where libelle='".$libelle."';";
            try {
                $res = $con->query($sql);
                $row = $res->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $row;
}


function lireLigneDeFrais($id_demandeur){
	$con = base();

	$sql = "select * from lignefrais a join motif b where a.idMotif = b.idMotif  and idDemandeur='".$id_demandeur."';";
            try {
                $res = $con->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $rows;
}




function countCoutTotal($id_demandeur){
	$con = base();

	$sql = "select sum(coutTotal) as total from lignefrais a join motif b where a.idMotif = b.idMotif  and idDemandeur='".$id_demandeur."';";
            try {
                $res = $con->query($sql);
                $row = $res->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $row;
}

function mesClub()
{
		$con = base();
		
		$sql = "select * from club";
		try {
                $res = $con->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $rows;
}

function mesAdherents($id_demandeur)
{
	$con = base();

	$sql = "select numLicence, a.Nom, Prenom, dateNaissance, c.Nom as nomClub, a.id from adherent a join club c where a.idClub = c.idClub and idDemandeur='".$id_demandeur."';";
            try {
                $res = $con->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $rows;
}

function monAdherent($id)
{
	$con = base();

	$sql = "select numLicence, a.Nom, Prenom, dateNaissance, c.Nom as nomClub, a.id from adherent a join club c where a.idClub = c.idClub  and id=$id;";
            try {
                $res = $con->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $rows;
}



function insertAdherent($adherent, $id_demandeur)
{
	$con = base();	
       
         $sql = "insert into adherent (numLicence, Nom, Prenom, dateNaissance, idClub, idDemandeur) 
        values (".$adherent->numLicence.", '".$adherent->nom."', '".$adherent->prenom."', '".$adherent->dateNaissance."', ".$adherent->idClub.", ".$id_demandeur.");";
 		
        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }
}

function supprimerAdherent($id)
{
	$con = base();	
	$sql = "DELETE FROM adherent WHERE id = $id;";
                try {
                    $res = $con->exec($sql);
                } catch (PDOException $e) {
                    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
                }
}

function modifierAdherent($adherent, $id)
{
	$con = base();	
       
         $sql = "update adherent set numLicence = '".$adherent->numLicence."', Nom = '".$adherent->nom."', Prenom = '".$adherent->prenom."', dateNaissance = '".$adherent->dateNaissance."', idClub = '".$adherent->idClub."' where id=".$id."";
 		
        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }
}

function indemniter($annee)
{
	$con = base();

	$sql = "select * from indemnite where Annee='".$annee."';";
            try {
                $res = $con->query($sql);
                $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $rows;
}

function supprimerLigneDeFrais($idLigne)
{
	$con = base();	
	$sql = "DELETE FROM lignefrais WHERE idLigne = $idLigne;";
                try {
                    $res = $con->exec($sql);
                } catch (PDOException $e) {
                    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
                }
}

function maLigneDeFrais($id)
{
	$con = base();

	$sql = "select * from lignefrais a join motif b where a.idMotif = b.idMotif  and idLigne=$id;";
            try {
                $res = $con->query($sql);
                $row = $res->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
            }
            return $row;
}

function modifierLigneDeFrais($noteDeFrais, $id)
{
	$con = base();	
       
         $sql = "update lignefrais set date = '".$noteDeFrais->date."', trajet = '".$noteDeFrais->trajet."', km = '".$noteDeFrais->km."', coutPeage = '".$noteDeFrais->coutPeage."', coutRepas = '".$noteDeFrais->coutRepas."', coutHebergement = '".$noteDeFrais->coutHebergement."', coutTotal = '".$noteDeFrais->coutTotal."', Annee = '".$noteDeFrais->annee."', coutTrajet='".$noteDeFrais->coutTrajet."' where idLigne=".$id."";
 		
        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }
}

function modifierMotif($motif, $id)
{

	$con = base();	
       
         $sql = "update motif set libelle = '".$motif->libelle."' where idMotif ='".$id."';";
 		
        try {
            $nb = $con->exec($sql);
        } catch (PDOException $e) {
            die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
        }
}

