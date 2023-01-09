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
 
 
echo '<div style="border:solid black; width:13%; align:center;margin-left: auto;margin-right:auto;"';
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




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shifumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css" >
  </head>
  <body>
    <h1>Shifumi</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="row g-0 bg-body-secondary position-relative">
      <div class="col-md-6 mb-md-0 p-md-4">
      <img src="..." class="w-100" alt="...">
    </div>
    <div class="card" style="width: 18rem;">
     <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.istockphoto.com%2Ffr%2Fphotos%2Fshifumi&psig=AOvVaw2H7eNNAJPQi48h7pOkMRSC&ust=1673340888253000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCJDBs9uOuvwCFQAAAAAdAAAAABAE" class="card-img-top" alt="...">
    <div class="card-body">
      <a href="#" class="stretched-link text-danger" style="position: relative;"> 
    </p>
    <p class="card-text bg-light" style="transform: rotate(0);">
     
    </p>
    </div>
    </div>
  </body>

</html>

  
  
