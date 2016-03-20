<?php
// page d'accueil

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire où se trouve les fichiers templates et le répértoire où on met les fichiers compilés (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);



page_header('Accueil', 'Bienvenue sur FREDI', 'HOME');
page_footer();

$template->set_filenames(array(
	'body' => 'accueil.html'));

$template->display('body');

if(isset($_SESSION['connecter'])) {
	$id_demandeur = $_SESSION['id_demandeur'];
	//$lireId = lireDemandeur($id_demandeur);

	echo "<a href='moncompte.php?num=".$id_demandeur."'>Modifier mon profil</a>";

}
?>