</div>
<div id="footer">
	<?php echo ((isset($this->_rootref['L_FOOTER'])) ? $this->_rootref['L_FOOTER'] : ((isset($this->lang['FOOTER'])) ? $this->lang['FOOTER'] : '{ FOOTER }')); ?><br />
	<?php echo ((isset($this->_rootref['L_TODAY'])) ? $this->_rootref['L_TODAY'] : ((isset($this->lang['TODAY'])) ? $this->lang['TODAY'] : '{ TODAY }')); ?> : <?php echo (isset($this->_rootref['C_DATE'])) ? $this->_rootref['C_DATE'] : ''; ?>
</div>
</body>
</html>