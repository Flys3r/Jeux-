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

if (!isset($_SESSION['last_players_choice'])) {
  $_SESSION['last_players_choice'] = [];
}

if (!isset($_SESSION['cptJoueur'])) {
  $_SESSION['cptJoueur'] = 0;
}
if (!isset($_SESSION['cptOrdi'])) {
  $_SESSION['cptOrdi'] = 0;
}
if (!isset($_SESSION['cptEgalite'])) {
  $_SESSION['cptEgalite'] = 0;
}

if (!isset($_SESSION['tour'])) {
  $_SESSION['tour'] = 1;
}
$turn = $_SESSION['tour'];

$tirageJoueur = ['Pierre', 'Feuille', 'Ciseaux'];
shuffle($tirageJoueur);

function save_last_players_choice($choice)
{
  $array = $_SESSION['last_players_choice'];
  if (empty($array)) {
    $array = [];
  }
  array_push($array, $choice);
  $_SESSION['last_players_choice'] = $array;
}

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
if (isset($_POST['choix'])) {
    $last_choice = end($_SESSION['last_players_choice']);
    $hals_choice = hals_choice();
    $player_choice = $_POST['choix'];
    save_last_players_choice($player_choice);
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
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Pierre-Feuille-Ciseaux</title>
  <script>
    function sendChoice(choice) {
      fetch('index.php', {
        method: 'POST',
        body: new URLSearchParams({
          'choix': choice
        })
      });
    }
  </script>
</head>
<body>
  <h1>Pierre-Feuille-Ciseaux</h1>
  <p>Choisissez votre coup :</p>
  <form>
    <img src="pierre.png" alt="Pierre" width="100" onclick="sendChoice('Pierre')">
    <img src="feuille.png" alt="Feuille" width="100" onclick="sendChoice('Feuille')">
    <img src="ciseaux.png" alt="Ciseaux" width="100" onclick="sendChoice('Ciseaux')">
  </form>
  <br>
  <h3>Résultats :</h3>
  <p>Nombre de victoires : <?php echo $_SESSION['cptJoueur'] ?></p>
  <p>Nombre de défaites : <?php echo $_SESSION['cptOrdi'] ?></p>
  <p>Nombre d'égalités : <?php echo $_SESSION['cptEgalite'] ?></p>
</body>
</html>
