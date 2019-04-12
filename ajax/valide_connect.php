<?php
session_start();

include_once('../class/autoload.php');

$errors         = array();
$data 			= array();
$data['success']=false;

$tab=array();


$tab['id']=$_POST['id'];
$tab['mp']=$_POST['mp'];
$tab['infirmiere']='infirmiere';


$json = file_get_contents("http://www.btssio-carcouet.fr/ppe4/public/connect2/".$tab['id']."/".$tab['mp']."/".$tab['infirmiere']);


$parsed_json = json_decode($json);

if (isset($parsed_json->{'status'}))
{
    $errors['message']='Identifiant,mot de passe,catégorie invalide !';
}
else
  {
    $_SESSION['id']=$tab['id'];
    $_SESSION['infirmiere']=$tab['infirmiere'];
      $data['success']=true;
  }

if ( ! empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    if($data['success'])
    {
        $data['message'] = "Bienvenue ".$tab['id']."!";

    }
}
echo json_encode($data);
?>
