<?php
class page_base_securisee_infirmiere extends page_base {

	public function __construct() {
		parent::__construct();
	}
	public function affiche() {
		if(!isset($_SESSION['id']))
		{
			echo '<script>document.location.href="Accueil"; </script>';

		}
		else
		{
			if(!$_SESSION['infirmiere'])
			{
				echo '<script>document.location.href="Accueil"; </script>';
			}
			else
			{
				parent::affiche();
			}
		}
	}
	public function affiche_menu() {

		parent::affiche_menu();
		?>
		<ul class="navbar-nav   ">
				 <li class="nav-item">

		<li class="nav-item">
	 	 <a class="nav-link" href="#"><?php echo $_SESSION['id'];?></a>
	  </li>
		</ul>



		<?php

	}
}
?>
