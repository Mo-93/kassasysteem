<?php

// In composer.json wordt acme-namespace aan src-folder gekoppeld
// Elk php-bestand moet een namespace hebben, geredeneerd vanuit de src-map (acne-namespace)
// namespace Acme;

use Acme\model\TafelModel;

require_once "../vendor/autoload.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kiezen tafel</title>
</head>

<style>

body{

    background-color: black;
    padding: 0;
    margin: 0;
    display: flex;
    justify-items: center ;
    align-items: center;
    justify-content: center;
}
h1{
    color: white;
}

div{

    width: 120px;
    height: 60px;
    justify-items: center;
    align-items: center;
    margin: 70px;
}

a{
    background-color: blue;
    margin: 20px;
    padding: 20px;
    color: brown;
    border-radius: 20px;
    text-decoration: none;

}

a:hover{

    background-color: white;
}

</style>






<body>
<pre>
<?php
 // TODO: alle tafels ophalen uit de database en als hyperlinks laten zien (maak gebruik van class TafelModel)
 //   Zoiets als dit:

    echo "<h1> tafels </h1>";

        $tafelModel = new TafelModel();

        $tafels = $tafelModel->getAll();

    foreach ($tafels as $tafel) {
        $idtafel = $tafel->getColumnValue('idtafel');
        $omschrijving = $tafel->getColumnValue('omschrijving');

        
        echo "<div><a href='keuze.php?idtafel={$idtafel}'>{$omschrijving}</a></div>";
    }





?>
</body>
</html>
