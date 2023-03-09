<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

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

 
  
<?php
session_start();

// Initialisation des compteurs
if (!isset($_SESSION['cptJoueur'])) {
  $_SESSION['cptJoueur'] = 0;
}
if (!isset($_SESSION['cptOrdi'])) {
  $_SESSION['cptOrdi'] = 0;
}
if (!isset($_SESSION['cptEgalite'])) {
  $_SESSION['cptEgalite'] = 0;
}

// Initialisation du tableau des choix du joueur
if (!isset($_SESSION['last_players_choice'])) {
  $_SESSION['last_players_choice'] = [];
}

// Initialisation du tour
if (!isset($_SESSION['tour'])) {
  $_SESSION['tour'] = 1;
}
$turn = $_SESSION['tour'];

// Tirage aléatoire des choix du joueur
$tirageJoueur = ['Pierre', 'Feuille', 'Ciseaux'];
shuffle($tirageJoueur);

// Fonction pour sauvegarder le dernier choix du joueur dans le tableau
function save_last_players_choice($choice)
{
  $array = $_SESSION['last_players_choice'];
  if (empty($array)) {
    $array = [];
  }
  array_push($array, $choice);
  $_SESSION['last_players_choice'] = $array;
}

// Fonction pour déterminer le choix de Hal
function hals_choice()
{
  global $turn, $tirageJoueur;
  $bats = ['Feuille' => 'Ciseaux', 'Ciseaux' => 'Pierre', 'Pierre' => 'Feuille'];
  $hals_choice = null;
  switch ($turn) {
    case 1:
      shuffle($tirageJoueur);
      $hals_choice = $tirageJoueur[0];
      break;
    case 2:
      $array = $_SESSION['last_players_choice'];
      $last_choice = end($array);
      $hals_choice = $bats[$last_choice];
      break;
    case 3:
      $new_choices = array_diff($tirageJoueur, $_SESSION['last_players_choice']);
      $hals_choice = reset($new_choices);
      break;
    case 4:
      $hals_choice = end($_SESSION['last_players_choice']);
      break;
    default:
      break;
  }
  return $hals_choice;
}

// Traitement du choix du joueur
if (isset($_POST['choix'])) {
  $player_choice = $_POST['choix'];
  save_last_players_choice($player_choice);
  $last_choice = end($_SESSION['last_players_choice']);
  $hals_choice = hals_choice();
  echo 'Vous avez choisi : <b>' . $player_choice . '</b><br>';
  echo 'Hal a choisi : <b>' . $hals_choice . '</b><br>';
  if ($player_choice == $hals_choice) {
    echo "Egalité !<br>";
    $_SESSION['cptEgalite']++;
  } elseif ($hals_choice == 'Feuille' && $player_choice == 'Pierre' || $hals_choice == 'Ciseaux' && $player_choice == 'Feuille' || $hals_choice == 'Pierre' && $player_choice == 'Ciseaux') {
    echo "Perdu !<br>";
    $_SESSION['cptOrdi']++;
  } else {
    echo "Gagné !<br>";
    $_SESSION['cptJoueur']++;
  }
  $_SESSION['tour']++;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jeu pierre feuille ciseaux</title>
  </head>
  <body>
    <div>
      <p><b>Résultats :</b></p>
      <p>Nombre de parties jouées : <?php echo ($turn - 1); ?></p>
      <p>Nombre de victoires : <?php echo $_SESSION['cptJoueur']; ?></p>
      <p>Nombre de défaites : <?php echo $_SESSION['cptOrdi']; ?></p>
      <p>Nombre d'égalités : <?php echo $_SESSION['cptEgalite']; ?></p>
    </div>

    <form method="POST">
      <p><b>Votre choix :</b></p>
      <div>
        <input type="radio" id="pierre" name="choix" value="Pierre">
        <label for="pierre"><img src="pierre.png"></label>
      </div>
      <div>
        <input type="radio" id="feuille" name="choix" value="Feuille">
        <label for="feuille"><img src="feuille.png"></label>
      </div>
      <div>
        <input type="radio" id="ciseaux" name="choix" value="Ciseaux">
        <label for="ciseaux"><img src="ciseaux.png"></label>
      </div>
      <button type="submit">Jouer</button>
    </form>

    <p><b>Règles :</b> Pierre bat ciseaux, feuille bat pierre et ciseaux bat feuille. Bonne chance !</p>
  </body>
</html>
