
<!doctype html>
<html lang="en">
  <head>   
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="./stylee.css">
    <title>SHIFUMI</title>
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">Acceuil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Tableau de score</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Jouer</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">recherche</button>
      </form>
      </div>
    </div>
  </nav>

      <nav>
      <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        REGLES DE JEU
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Pierre-feuille-ciseaux</strong> est un jeu qui se joue avec les mains et avec deux joueurs. Chacun des joueurs met une main dans le dos et va choisir un des coups possibles <strong>(pierre, feuille ou ciseaux)</strong> et le symboliser avec sa main toujours dans son dos. Pour le coup <strong>pierre</strong> le joueur ferme le poing. Pour le coup <strong>feuille</strong> il met sa main à plat. Et pour le dernier coup possible le <strong>ciseaux</strong> le joueur écarte ses deux doigts. Les deux joueurs révèlent ensuite leur main et donc le coup qu’ils décident de jouer simultanément. De façon générale : 
        - Le jeux de <strong>pierre</strong> bat les <strong>ciseaux</strong> (en les écrasant).
        - Le jeux de <strong>ciseaux</strong> bat la feuille (en la coupant).
        - La <strong>feuille</strong> bat la pierre (en l'enveloppant). 
        Ainsi chaque coup bat un autre coup. 
        Si les joueurs révèlent le même symbole <strong>(pierre/pierre feuille/feuille ciseaux/ciseaux)</strong> cela fait match nul : personne ne marque de points..
          </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        INSCRIPTION
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <div>
          <form action="formulaire.php" method="POST"> 
          <label for="nom"> Nom : </label><input type="text" name="nom" id="nom" placeholder="Entrez votre nom" /><br/><br/>
          <label for="adresse"> Adresse IP : </label><input type="text" name="adresse IP" id="adresse IP" placeholder="Votre adresse IP" /><br/><br/
         <label for="photo"> Photo : </label><input type="text" name="photo" id="photo" placeholder="Mettre  une photo" /><br/><br/>      
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
    </h2> 
    <div class="d-grid gap-2 col-2 mx-auto">
    <button class="btn btn-light" type="button">
    <a href="game.php">JOUER</a></button>
  </div>
    </body>
</html>
