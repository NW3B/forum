<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>


<body>
<?php
/*
if (empty($_POST['pseudo'])){
echo '
<form method="post" action="test.php" enctype="multipart/form-data">
<label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" /><br />
<p><input type="submit" value="S\'inscrire" /></p></form>
</form>
';
}

else{
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
if (password_verify('nico', $pass)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}    
}
*/
 
?>


</body>
</html>

<?php 

/*
$test = password_hash("nico", PASSWORD_BCRYPT);
echo ($test);
echo("<br>");
*/
/*
echo '<br>';

$test2 = password_hash("nico", PASSWORD_DEFAULT);
echo ("TEST2 : " .$test2);
echo '<br>';

if (password_verify('nico', $test2)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

*/

?>