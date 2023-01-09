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
