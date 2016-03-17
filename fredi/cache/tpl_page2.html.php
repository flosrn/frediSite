<?php $this->_tpl_include('header.html'); ?>

<p>
Voici la deuxi&egrave;me page.<br />
Un lien pour mieux utiliser le moteur de template phpBB3: <a href="<?php echo (isset($this->_rootref['U_DOC'])) ? $this->_rootref['U_DOC'] : ''; ?>" title="Documentation phpBB3"><?php echo (isset($this->_rootref['U_DOC'])) ? $this->_rootref['U_DOC'] : ''; ?></a>
</p>
<p>Bla bla bla bla bla ...test... et bonne prog.</p>

<?php $this->_tpl_include('footer.html'); ?>