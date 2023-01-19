<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="widht=device-widht, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
   <title>SHIFUMI</title>
   <link rel="stylesheet" href="./stylee.css"> 
  </head> 
  <body>
    <header> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="game.php">Jeux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="resultat.php">Tableau de score</a>
        </li>
      </ul>
      <form class="d-flex" role="recherche">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="recherche">
        <button class="btn btn-outline-success" type="submit">recherche</button>
      </form>
    </div>
  </div>
</nav>
</header>
</body>
</html>
<?php
session_start();

$tirageOrdi=['Pierre', 'Feuille', 'Ciseaux']; // Création du tableau avec les valeurs
shuffle($tirageOrdi); // Mélange
 
$tirageJoueur=['Pierre', 'Feuille', 'Ciseaux']; // Création du tableau avec les valeurs
 
if(!isset($_SESSION['cptJoueur']) && !isset($_SESSION['cptOrdi']) && !isset($_SESSION['cptEgalite'])){
    $_SESSION['cptJoueur'] = 0;
    $_SESSION['cptOrdi'] = 0;
    $_SESSION['cptEgalite'] = 0;
}
echo '<div style=" border:solid white; width:13%; align:center;margin-left: auto;margin-right:auto;"';
echo 'Compteur de points : <br>';
if(isset($_POST['choix'])):
    if ($_POST['choix'] == $tirageOrdi[0]){
        echo '<b>Egalité</b>' . '<br>';
        $_SESSION['cptEgalite']++;
    }
    // joueur win
    if ($_POST['choix'] == 'Pierre' && $tirageOrdi[0] == 'Ciseaux'){
        echo '<b>Vous avez gagné</b>' . '<br>';
        $_SESSION['cptJoueur']++;
    }
    if ($_POST['choix'] == 'Feuille' && $tirageOrdi[0] == 'Pierre'){
        echo '<b>Vous avez gagné</b>' . '<br>';
        $_SESSION['cptJoueur']++;
    }
    if ($_POST['choix'] == 'Ciseaux' && $tirageOrdi[0] == 'Feuille'){
        echo '<b>Vous avez gagné</b>' . '<br>';
        $_SESSION['cptJoueur']++;
    }
    // ordi win
    if ($_POST['choix'] == 'Ciseaux' && $tirageOrdi[0] == 'Pierre'){
        echo '<b>Vous avez été battu</b>' . '<br>';
        $_SESSION['cptOrdi']++;
    }
    if ($_POST['choix'] == 'Pierre' && $tirageOrdi[0] == 'Feuille'){
        echo '<b>Vous avez été battu</b>' . '<br>';
        $_SESSION['cptOrdi']++;
    }
    if ($_POST['choix'] == 'Feuille' && $tirageOrdi[0] == 'Ciseaux'){
        echo '<b>Vous avez été battu</b>' . '<br>';
        $_SESSION['cptOrdi']++;
    }
    echo 'Vous avez choisi : <b>' . $_POST['choix'] . '</b><br>';
    echo "L'ordinateur a choisi : <b>" . $tirageOrdi[0] . "</b><br><br>";
    echo 'Compteur de points : <br>';
    echo 'Joueur : ' . $_SESSION['cptJoueur'] . ' | Ordinateur : ' . $_SESSION['cptOrdi'] . ' | Egalité : ' . $_SESSION['cptEgalite'] . '<br><br>';
endif;
echo '<form method="post" action="">';
foreach ($tirageJoueur as $valeur) {
echo "<input type='radio' id='$valeur' name='choix' value='$valeur' required> <label for='$valeur'> $valeur </label> <br>";
}
echo '<br><input type="submit">';
echo '</form>';   
echo '</div>';
?>





  
  
