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
    echo "<img src='",$shifumi ['image'],"'/>";
    
}
?>
