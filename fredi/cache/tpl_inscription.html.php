<?php $this->_tpl_include('header.html'); ?>
<?php 
if (isset($_POST['submit'])) { //Si l'utilisateur appuie sur le bouton "S'inscire"
	inscription();
}
?>
<div id="contenu">

    <!--Formulaire d'inscription-->
    <h1>Inscription</h1>
    <p>Veuillez saisir les informations demandées pour vous inscrire<p>
    <form id = "formulaireinscription" method="post" action="">

        <label>Adresse mail: </label>
        <input type="email" name="mail" value="@m2l.com" required><br/><br/> 

        <label>Mot de passe:</label>
        <input type="password" name="mdp" placeholder="Mot de passe" required><br/><br/>

        <label>Ligue : </label>
        <select name="ligue" id="ligue">
            <option value="1">Ligue d'escrime</option>
            <option value="2">Ligue de badminton</option>
            <option value="3" selected="selected">Ligue de volleyball</option> 
            <option value="4">Ligue de snowboard</option>
        </select>
        <br/><br/>
        <input type="submit" name="submit" value="S'inscrire"><!--Bouton submit-->
        <input type="reset" name="reset" value="Réinitialiser"><!---Bouton reset-->
    </form>
    <?php echo "<p>$message</p>"; ?>
    <?php echo $test; ?>
</div>

<?php $this->_tpl_include('footer.html'); ?>