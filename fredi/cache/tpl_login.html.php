<?php $this->_tpl_include('header.html'); ?>



<h1><center>Connexion</center></h1>
        <p>Veillez remplir le formulaire.</p>

        <form id="formulaire" action="login.php" method="post">
            <p>
                <label for="pseudo" >Mail</label><br />
                <input type="text" value="" name="mail" required="required" /><br />
                <label for="mdp" >Mot de passe</label><br />
                <input type="password" value="" name="mdp" required="required" /><br />

            </p>

            <input type="submit" value="Envoyer" name="submit" />
            <input type="reset" value="Réinitialiser" name="Réinitialiser" />
        </form>
        

<?php
if ((isset($_POST['mail'])) && (isset($_POST['mdp']))) {
	$login = $_POST['mail'];

	$password =sha1($_POST['mdp']);
}

$submit = isset($_POST['submit']);

if ($submit){
	login($login, $password);
}


?>

<?php $this->_tpl_include('footer.html'); ?>