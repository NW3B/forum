<?php
session_start();
$titre="Connexion";
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> Connexion';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<?php
echo '<h1>Connexion</h1>';

if ($id!=0) 
{
    erreur(ERR_IS_CO);
}

if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
?>
    <form method="post" action="connexion.php">
	<fieldset>
	<legend>Connexion</legend>
	<p>
	<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" autocomplete="username" id="pseudo" /><br />
    <label for="password">Mot de Passe :</label><input type="password" autocomplete="current-password" name="password" id="password" /><br />
    <label>Se souvenir de moi ?</label><input type="checkbox" name="souvenir" /><br />

	</p>
	</fieldset>
	<p><input type="submit" value="Connexion" /></p></form>
	<a href="./register.php">Pas encore inscrit ?</a>
	 
	</div>
	</body>
    </html>
    
<?php
}

else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT membre_mdp, membre_id, membre_rang, membre_pseudo, membre_derniere_visite
        FROM forum_membres WHERE membre_pseudo = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();

        $passwordCorrect = password_verify($_POST['password'], $data['membre_mdp']); /// booléen

	    if ($passwordCorrect) // Acces OK !    
        {
            $_SESSION['pseudo'] = $data['membre_pseudo'];
            $_SESSION['level'] = $data['membre_rang'];
            $_SESSION['id'] = $data['membre_id'];
            $temps = date("Y-m-d H:i:s");

            $query=$db->prepare('UPDATE forum_membres SET membre_derniere_visite = :dateHeure WHERE membre_pseudo = :pseudo');
            $query->bindValue(':dateHeure', $temps, PDO::PARAM_STR);
            $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
            $query->execute();

            $message = '<p>Bienvenue '.$data['membre_pseudo'].', 
                vous êtes maintenant connecté!</p>
                <p>Redirection Automatique en cour ...</p>
                <p>ou Cliquez <a href="./index.php">ici</a> 
                pour revenir à la page d accueil</p>';   

            // --- Cookies
            if (isset($_POST['souvenir']))
            {
            $expire = time() + 365*24*3600;
            setcookie('pseudo', $_SESSION['pseudo'], $expire, null, null, false, true); //mode httpOnly
            setcookie('pass_hash',password_hash($_POST['password'], PASSWORD_DEFAULT), $expire, null, null, false, true);
            } 
    ?>

    <script>
        // Redirection auto après délai
        setTimeout(function(){
            window.location.href = "index.php";
        }, 4000);
    </script>


    <?php
        }

        else // Acces pas OK !
        {
            $message = '<p>Une erreur s\'est produite 
            pendant votre identification.<br /> Le mot de passe ou le pseudo 
                entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
            pour revenir à la page précédente
            <br /><br />Cliquez <a href="./index.php">ici</a> 
            pour revenir à la page d accueil</p>';
        }
        $query->CloseCursor();
    }
    echo $message.'</div></body></html>';
}

?>




