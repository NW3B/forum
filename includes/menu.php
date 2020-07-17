<body>
<div id="banniere"></div>
<nav>
  <ul>
    <li class="deroulant"><a href="#">Cours Complets &ensp;</a>
      <ul class="sous">
        <li><a href="#">Cours HTML et CSS</a></li>
        <li><a href="#">Cours JavaScript</a></li>
        <li><a href="#">Cours PHP et MySQL</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="#">Articles &ensp;</a>
      <ul class="sous">
        <li><a href="#">CSS display</a></li>
        <li><a href="#">CSS position</a></li>
        <li><a href="#">CSS float</a></li>
      </ul>
    </li>
    <li><a href="#">Contact</a></li>
    <li class="deroulant"><a href="#">Mon Compte</a>
    <ul class="sous">
    <?php 
    if($id==0){
                    echo '<li><a href="connexion.php">Connection</a></li>
                        <li><a href="register.php">Inscrivez-vous</a></li> ';
                }
                else{
                        echo '<li><a href="deconnexion.php">Déconnection</a></li>
                            <li><a href="./voirprofil.php?m='.$_SESSION['id'].'&amp;action=consulter">Voir mon profil</a></li>
                            ';
                }
    ?>
     </ul>
    </li>

  </ul>
</nav>
<div id="corps_forum">