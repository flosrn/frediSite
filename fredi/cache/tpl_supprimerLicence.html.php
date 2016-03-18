<?php $this->_tpl_include('header.html'); ?>
<?php
$id_demandeur = $_SESSION['id_demandeur'];
$suppr = $_GET['num'];

supprimerAdherent($suppr, $id_demandeur);

header('location: licence.php');
?>
<?php $this->_tpl_include('footer.html'); ?>