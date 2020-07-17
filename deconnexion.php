<?php
session_start();

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) 
{
    include("./includes/debut.php");
    erreur(ERR_IS_NOT_CO);
}
else{

    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');

    $titre="Déconnexion";
    include("includes/debut.php");
    include("includes/menu.php");



    echo '<p>Vous êtes à présent déconnecté <br />
    Redirection Automatique en cour ...<br />
    ou Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
    pour revenir à la page précédente.<br />
    Cliquez <a href="./index.php">ici</a> pour revenir à la page principale</p>';
    echo '</div></body></html>';
}
?>

<script>
        // Redirection auto après délai
        setTimeout(function(){
            window.location.href = "index.php";
        }, 4000);
</script>


