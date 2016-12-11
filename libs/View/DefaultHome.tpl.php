<?php
	$this->assign('title','Back2Home | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>Back2Home Web <i class="icon-thumbs-up"></i></h1>
			<p>Esta es una pagina solo para los administradores. Por favor vayase</p>
		</div>

	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>