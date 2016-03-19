<?php
// première page

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

/*  if($_SESSION['connecter'] == 0){
		header('location: index.php');
} */

// on precise le repertoire où se trouve les fichiers templates et le répértoire où on met les fichiers compilés (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma première page', 'Page 1', 'PAGE1');
page_footer();

// exemple liste d'article
$tab = array('Cahiers','Livres','Stylos','Crayons','Feutres','Règles','Raporteurs','Crayons de couleurs');
foreach($tab as $value)
	$template->assign_block_vars('article', array(
		'TEXT' => htmlentities($value)));

$template->assign_var('U_DOC', "http://area51.phpbb.com/docs/coding-guidelines.html#templating");
				
$template->set_filenames(array(
	'body' => 'supprimerLigneDeFrais.html'));

$template->display('body');
?>