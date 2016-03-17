<?php
// page login

include('includes/template.class.php');
include('includes/functions.php');
include('includes/config.php');
//include('cache/tpl_login.html.php');

// on precise le repertoire où se trouve les fichiers templates et le répértoire où on met les fichiers compilés (cache)
$template = new Template('template', 'cache');

// on precise la variable langage
$template->set_language_var($lang);

page_header('Ma page login', 'Page login', 'PAGE LOGIN');
page_footer();

$template->assign_var('U_DOC', "http://area51.phpbb.com/docs/coding-guidelines.html#templating");
				
$template->set_filenames(array(
	'body' => 'login.html'));


$template->display('body');


?>