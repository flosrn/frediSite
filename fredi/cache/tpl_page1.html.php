<?php $this->_tpl_include('header.html'); ?>

<p>
Voici la premi&egrave;re page.<br />
Un lien pour mieux utiliser le moteur de template phpBB3: <a href="<?php echo (isset($this->_rootref['U_DOC'])) ? $this->_rootref['U_DOC'] : ''; ?>" title="Documentation phpBB3"><?php echo (isset($this->_rootref['U_DOC'])) ? $this->_rootref['U_DOC'] : ''; ?></a>
</p>
<p>Bla bla bla bla bla .........</p>
<h3>Liste des articles:</h3>
<?php $_article_count = (isset($this->_tpldata['article'])) ? sizeof($this->_tpldata['article']) : 0;if ($_article_count) {for ($_article_i = 0; $_article_i < $_article_count; ++$_article_i){$_article_val = &$this->_tpldata['article'][$_article_i]; ?>
<?php echo $_article_val['TEXT']; ?><br />
<?php }} $this->_tpl_include('footer.html'); ?>