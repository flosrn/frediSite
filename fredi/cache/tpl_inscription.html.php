<?php $this->_tpl_include('header.html'); ?>
<div id="contenu">

    <!--Formulaire d'inscription-->
    <h1>Inscription</h1>
    <p>Veuillez saisir les informations demandées pour vous inscrire<p>
    <form id = "formulaireinscription" method="post" action="">
        
        <label for=nom>Nom:</label>
        <input type="text" name="nom" value="" required><br/><br/>

        <label for=prenom>Prenom:</label>
        <input type="text" name="prenom" value="" required><br/><br/>
        
        <label for=rue>Rue:</label>
        <input type="text" name="rue" value="" required><br/><br/>

        <label for=CP>Code Postal:</label>
        <input type="text" name="CP" value="" required><br/><br/>

        <label for=ville>Ville:</label>
        <input type="text" name="ville" value="" required><br/><br/>
        
        <label for=mail>Adresse mail: </label>
        <input type="email" name="mail" value="@m2.com" required><br/><br/> 

        <label for=mdp>Mot de passe:</label>
        <input type="password" name="mdp" placeholder="Mot de passe" required><br/><br/>

        <input type="submit" name="submit" value="S'inscrire"><!--Bouton submit-->
        <input type="reset" name="reset" value="Réinitialiser"><!---Bouton reset-->
    </form>
</div>

<?php 
if (isset($_POST['submit'])) { //Si l'utilisateur appuie sur le bouton "S'inscire"
    inscription();
}
?>

<?php $this->_tpl_include('footer.html'); ?>