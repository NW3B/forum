<!DOCTYPE html >
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" type="text/css" title="Design" href="./css/design.css" />
    
    <?php
        //Si le titre est indiqué, on l'affiche entre les balises <title>
        echo (!empty($titre))?'<title>'.$titre.'</title>':'<title> Forum </title>';
    ?>

</head>

<?php
//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

// --- Traitement cookies
if (isset ($_COOKIE['pseudo']) && empty($id)   /*&& isset ($_COOKIE['pass_hash'])*/  )
{
/* On créé la variable de session à partir du cookie pour ne pas avoir à vérifier 2 fois 
   sur les pages qu'un membre est connecté. */
$_SESSION['pseudo'] = $_COOKIE['pseudo'];
/*$_SESSION['level'] = $data['membre_rang'];
$_SESSION['id'] = $data['membre_id'];*/

/* cookies par comparaison mdp 
$_SESSION['pass_hash'] = $_COOKIE['pass_hash'];

$query=$db->prepare('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo FROM forum_membres WHERE membre_pseudo = :pseudo');
$query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();
$query->CloseCursor();
$passwordCorrect = password_verify($_SESSION['pass_hash'], $data['membre_mdp']); /// booléen
*/

}
if (isset ($_COOKIE['pseudo']) && !empty($id)  /*&& $passwordCorrect*/  );
{
    // on est connecté
    
}
if (!isset ($_COOKIE['pseudo']) && empty($id)   /* && !isset ($_COOKIE['pass_hash']) */   )
{
//On n'est pas connecté
}



//On inclue les 2 pages souvent utiles
include("./includes/functions.php");
include("./includes/constants.php");

?>


