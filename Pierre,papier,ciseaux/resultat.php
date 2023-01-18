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
    <a class="navbar-brand" href="game.php">Tableau des score</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jeux</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">recherche</button>
      </form>
    </div>
  </div>
</nav>
</header>
</body>
</html>
<?php
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"];
$dbh = new PDO('mysql:host=localhost;dbname=shifumi','root', '',$options);

$sth = $dbh->prepare("SELECT * FROM utilisateur");  
$sth->execute();
$shifumie = $sth->fetchAll();

foreach($shifumie as $shifumi){
    echo "<p>",$shifumi ['nom'],"</p>";
    echo "<p>",$shifumi ['date'],"</p>";
    echo "<p>",$shifumi ['nbr_victoire'],"</p>";
    echo "<p>",$shifumi ['nbr_partie'],"</p>";
    echo "<p>",$shifumi ['egalite'],"</p>";
   
    
}
?>
