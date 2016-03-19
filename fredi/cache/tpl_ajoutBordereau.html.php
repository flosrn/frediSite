<?php $this->_tpl_include('header.html');

if (isset($_SESSION['connecter'])) {
?>

<a href="Saisit_Note_Frait.php"><button onclick="newBordereau">saisir ligne de frais</button></a>

<?php 
}
else {
	echo "Veuillez vous connecter pour saisir une ligne de frais";
  echo "<p><a href='login.php'>Se connecter</a>";
}

$this->_tpl_include('footer.html'); ?>