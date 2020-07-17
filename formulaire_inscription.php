<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

<p>
    Cette page ne contient que du HTML.<br />
    Veuillez taper votre prénom :
</p>

<form method="post" action="mon-script.php"
 enctype="application/x-www-form-urlencoded"
  name="inscription">
  
<p>
    <label for="pseudo">Pseudo : </label>
    <input type="text" id="id_pseudo" name="pseudio"/>
</p>
<p>
    <label for="prenom">Mots de passe : </label>
    <input type="password" id="id_pass" name="pass"/>
</p>
<p>
    <label for="motdepasse">Retapez votre mot de passe : </label>
    <input type="password" id="motdepasse" name="motdepasse"/>
</p>
</form>
</body>
</html>