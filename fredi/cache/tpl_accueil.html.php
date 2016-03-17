<?php $this->_tpl_include('header.html'); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div id="carousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<img src="img/home_img.jpg" alt="First slide">
						<div class="carousel-caption">
						</div>
					</div>
				</div>
				<div class="main-text hidden-xs">
					<div class="col-md-12 text-center">
						<h1 class="col-xs-12 col-md-12 col-lg-12"><?php echo (isset($this->_rootref['PAGE_SUBTITLE'])) ? $this->_rootref['PAGE_SUBTITLE'] : ''; ?></h1>
						<h3>Vous avez déjà un compte ?</h3>
						<div class="">
							<?php $_menuloop_val = &$this->_tpldata['menuloop'][5]; ?>
							<a class="btn btn-success btn-sm btn-min-block" href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a>
							<?php $_menuloop_val = &$this->_tpldata['menuloop'][4]; ?>
							<a class="btn btn-success btn-sm btn-min-block" href="<?php echo $_menuloop_val['U_HREF']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->_tpl_include('footer.html'); ?>