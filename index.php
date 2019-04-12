<?php
	session_start();

	include_once('class/autoload.php');
	$site = connexionsecurise ();
	$controleur=new controleur();
	$request = strtolower($_SERVER['REQUEST_URI']);
	$params = explode('/', trim($request, '/'));
    $params = array_filter($params);
	if (!isset($params[1]))
	{
		$params[1]='accueil';
	}


	function connexionsecurise () {
	    $retour;
	    if(!isset($_SESSION['id']) )
	    {
	        $retour = new page_base();

	    }
	    else
	    {
	        if($_SESSION['infirmiere'])
	        {
	            $retour = new page_base_securisee_infirmiere();
	        }

	    }
	    return $retour;
	}


	switch ($params[1]) {
		case 'accueil' :
			$site->titre='Accueil';
			$site-> right_sidebar=$site->rempli_right_sidebar();
			$site-> left_sidebar=$controleur->retourne_article($site->titre);
			$site->affiche();
			break;
		case 'connexion' :
		$site->titre='Connexion';
				$site->js='jquery.validate.min';
				$site->js='connexion';
				$site->js='messages_fr';
				$site->js='tooltipster.bundle.min';
				$site->js='all';
				$site->css='tooltipster-sideTip-borderless.min';
				$site->css='tooltipster.bundle.min';
				$site->css='all';
				$site-> right_sidebar=$site->rempli_right_sidebar();
				$site-> left_sidebar=$controleur->retourne_formulaire_login();
				$site->left_sidebar=$controleur->retourne_modal_message();
				$site->affiche();
				break;
		case 'deconnexion' :
			$_SESSION=array();
			session_destroy();
			echo '<script>document.location.href="Accueil"; </script>';
			break;
		default:
			$site->titre='Accueil';
			$site-> right_sidebar=$site->rempli_right_sidebar();
			$site-> left_sidebar='<img src="'.$site->path.'/image/erreur-404.png" alt="Erreur de liens">';
			$site->affiche();
			break;
	}

?>
