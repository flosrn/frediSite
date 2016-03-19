<?php $this->_tpl_include('header.html'); ?>
<?php
$id_demandeur = $_SESSION['id_demandeur'];
$idLigne = $_GET['num'];

supprimerLigneDeFrais($idLigne);

header('location: Gerer_bordereau.php');
?>
<?php $this->_tpl_include('footer.html'); ?>