<?php
// deuxi�me page

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');

// on precise le repertoire o� se trouve les fichiers templates et le r�p�rtoire o� on met les fichiers compil�s (cache)
$template = new Template('template', 'cache');
//y
// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma deuxi�me page', 'Page 2', 'PAGE2');
page_footer();

$template->assign_var('U_DOC', "http://area51.phpbb.com/docs/coding-guidelines.html#templating");
				
$template->set_filenames(array(
	'body' => 'moncompte.html'));

$template->display('body');

if($_SESSION['connecter'] == 0){
		header('Location : index.php');
}
?>