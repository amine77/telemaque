<?php include 'templates/header.php';

foreach ($personnes as $personne){
    echo "Login: ".$personne['login']."<br>";
}


include 'templates/footer.php';?>