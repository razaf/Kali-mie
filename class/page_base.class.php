<?php

class page_base {
	protected $right_sidebar;
	protected $left_sidebar;
	protected $titre;
	protected $js=array('jquery-3.3.1.min','bootstrap.min');
	protected $css=array('perso','bootstrap.min','mdb.min', 'modele');
	protected $page;
	protected $metadescription="Bienvenue chez Kaliémie";
	protected $metakeyword=array('france','site touristique','tourisme','géolocalisation' );
	protected $path='http://localhost/ppe4';

	public function __construct() {
		$numargs = func_num_args();
		$arg_list = func_get_args();
        if ($numargs == 1) {
			$this->titre=$numargs[0];
		}
	}

	public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'css' : {
				$this->css[count($this->css)+1] = $valeur;
				break;
			}
			case 'js' : {
				$this->js[count($this->js)+1] = $valeur;
				break;
			}
			case 'metakeyword' : {
				$this->metakeyword[count($this->metakeyword)+1] = $valeur;
				break;
			}
			case 'titre' : {
				$this->titre = $valeur;
				break;
			}
			case 'metadescription' : {
				$this->metadescription = $valeur;
				break;
			}
			case 'right_sidebar' : {
				$this->right_sidebar = $this->right_sidebar.$valeur;
				break;
			}
			case 'left_sidebar' : {
				$this->left_sidebar = $this->left_sidebar.$valeur;
				break;
			}
			default:
			{
				$trace = debug_backtrace();
				trigger_error(
            'Propriété non-accessible via __set() : ' . $propriete .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);

				break;
			}

		}
	}
	public function __get($propriete) {
		switch ($propriete) {
			case 'titre' :
				{
					return $this->titre;
					break;
				}
				case 'path' :
				{
					return $this->path;
					break;
				}
				default:
			{
				$trace = debug_backtrace();
        trigger_error(
            'Propriété non-accessible via __get() : ' . $propriete .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);

				break;
			}

		}
	}
	/******************************Gestion des styles **********************************************/
	/* Insertion des feuilles de style */
	private function affiche_style() {
		foreach ($this->css as $s) {
			echo "<link rel='stylesheet'  href='".$this->path."/css/".$s.".css' />\n";
 	echo "<link rel='stylesheet'  href='".$this->path."/css/".$s.".boostrap.min.css' />\n";
		}

	}
	/******************************Gestion du javascript **********************************************/
	/* Insertion  js */
	private function affiche_javascript() {
		foreach ($this->js as $s) {
			echo "<script src='".$this->path."/js/".$s.".js'></script>\n";
		}
	}
	/******************************affichage metakeyword **********************************************/

	private function affiche_keyword() {
		echo '<meta name="keywords" content="';
		foreach ($this->metakeyword as $s) {
			echo utf8_encode($s).',';
		}
		echo '" />';
	}
//	<header>
//	<nav class="navbar navbar-light fixed-top bg-light">
	//		<a class="navbar-brand" href="#"> <img src="'.$this->path.'/image/logo.png" width="150" height="75" alt=""> </a>

//</div>
//		</nav>
	/****************************** Affichage de la partie entÃªte ***************************************/
	protected function affiche_entete() {
		echo'
		<!--Navbar -->
		<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
		  <a class="navbar-brand" href="#">KALIEMIE</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
		    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
		    <ul class="navbar-nav ml-auto ">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home
		          <span class="sr-only">(current)</span>
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Equipe</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Témoignages</a>
		      </li>
</ul>




		';
	}
	/**********<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
	<div class="carousel-item active">
		<img class="d-block w-100 img-fluid" src="'.$this->path.'/image/medecin.jpg" alt="First slide">
	</div>

</div>
</div>******************** Affichage du menu ***************************************/

	protected function affiche_menu() {
		echo '


			';
	}
	protected function affiche_menu_connexion() {

		echo '	    <ul  class="navbar-nav  navbar-fixed-right">
					<li class="nav-item">';

	if(!isset($_SESSION['id']))
		{
			echo'
						<a class="btn btn-outline-light" href="'.$this->path.'/connexion">Connexion </a>
						</li>
						</ul>
					</div>
				</nav>

				<!--/.Navbar -->

				';
		}
		else
		{
			echo '
			<div class="btn-group">
			  <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    '.$_SESSION['id'].'
			  </button>
			  <div class="dropdown-menu dropdown-menu-right">
			    <a <button  class="dropdown-item"href="'.$this->path.'/Deconnexion" role="link" >Deconnexion  </button></a>
			    <a <button  class="dropdown-item"href="'.$this->path.'/Deconnexion" role="link" >Deconnexion  </button></a>
			    <a <button  class="dropdown-item"href="'.$this->path.'/Deconnexion" role="link" >Deconnexion  </button></a>
			  </div>
			</div>
			</li>
			</ul>
		</div>
		</nav>

		<!--/.Navbar -->

				';
		}

	}
	public function affiche_entete_menu() {
		echo '


				';

	}
	public function affiche_footer_menu(){
		echo '


			';

	}

		/****************************************** remplissage affichage colonne ***************************/
	public function rempli_right_sidebar() {
		return'



				';

	}

	/****************************************** Affichage du pied de la page ***************************/
	private function affiche_footer() {
		echo '
		<!-- Footer -->
			<footer>

            </footer>
		';
	}


	/********************************************* Fonction permettant l'affichage de la page ****************/

	public function affiche() {


		?>
			<!DOCCTYPE html>
			<html lang='fr'>
				<head>
					<title><?php echo $this->titre; ?></title>
					<meta http-equiv="content-type" content="text/html; charset=utf-8" />
					<meta name="description" content="<?php echo $this->metadescription; ?>" />

					<?php $this->affiche_keyword(); ?>
					<?php $this->affiche_javascript(); ?>
					<?php $this->affiche_style(); ?>
				</head>
				<body>


						<?php $this->affiche_entete(); ?>
						<?php $this->affiche_entete_menu(); ?>
						<?php $this->affiche_menu(); ?>
						<?php $this->affiche_menu_connexion(); ?>
						<?php $this->affiche_footer_menu(); ?>

						<div style="clear:both;">
					    						<div style="float:left;width:75%;">
					     							<?php echo $this->left_sidebar; ?>
					    						</div>
					    						<div style="float:left;width:25%;">
													<?php echo $this->right_sidebar;?>
					    						</div>
					  						</div>
							<?php $this->affiche_footer(); ?>


				</body>
			</html>
		<?php
	}

}

?>
