<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-language" content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?> - <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?></title>
<?php $_addstyle_count = (isset($this->_tpldata['addstyle'])) ? sizeof($this->_tpldata['addstyle']) : 0;if ($_addstyle_count) {for ($_addstyle_i = 0; $_addstyle_i < $_addstyle_count; ++$_addstyle_i){$_addstyle_val = &$this->_tpldata['addstyle'][$_addstyle_i]; ?>
<link rel="stylesheet" href="<?php echo $_addstyle_val['HEAD_STYLESHEET']; ?>" media="all" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha256-Ay17X/itZzhUFkDfLB9MICE7tbVwtPuFhcwDpABdbEA= sha512-eTtl6Aa3v8DrTCYWH7cAfXt6QW8DpsFn0hdCcYIWe6VDMyPMikXBWd/9bZR5YZNrmHBBu4KGdVgfPs1aEEgVIw==" crossorigin="anonymous">
<?php }} ?>
</head>
<body>
  <div id="header">
   <!-- <h1><?php //echo ((isset($this->_rootref['L_LOGO'])) ? $this->_rootref['L_LOGO'] : ((isset($this->lang['LOGO'])) ? $this->lang['LOGO'] : '{ LOGO }')); ?></h1> -->
 </div>
 <div id="top_navbar">
   <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $this->_rootref['SITENAME']; ?>">FREDI</a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-2">
        <?php if ($this->_rootref['MENU_LIST']) {  ?>
        <ul class="nav navbar-nav navbar-right">
          <?php $_menuloop_count = (isset($this->_tpldata['menuloop'])) ? sizeof($this->_tpldata['menuloop']) : 0;
          if ($_menuloop_count) {
            for ($_menuloop_i = 0; $_menuloop_i < ($_menuloop_count-4); ++$_menuloop_i) {
              if ($_menuloop_i == 2) {
                $_menuloop_val = &$this->_tpldata['menuloop'][$_menuloop_i]; ?>
                <li>
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="<?php echo $_menuloop_val['U_HREF']; ?>">
                    <?php echo $_menuloop_val['TEXT']; ?><span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                    <?php $_menuloop_val = &$this->_tpldata['menuloop'][7]; ?>
                    <li><a href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a></li>

                    <?php $_menuloop_val = &$this->_tpldata['menuloop'][9]; ?>
                    <li><a href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a></li>

                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                      <a tabindex="-1" href="#">Autres options</a>
                      <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#"></a></li>

                        <?php $_menuloop_val = &$this->_tpldata['menuloop'][8]; ?>
                        <li><a href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a></li>

                        <?php $_menuloop_val = &$this->_tpldata['menuloop'][10]; ?>
                        <li><a href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a></li>

                      </ul>
                    </li>
                  </ul>
                </li>
              <?php } else { 
                $_menuloop_val = &$this->_tpldata['menuloop'][$_menuloop_i]; ?>
                <li><a href="<?php echo $_menuloop_val['U_HREF']; ?>" title="<?php echo $_menuloop_val['INFO']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a></li>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
<div id="content">
<?php session_start(); ?>
