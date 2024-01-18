<?php

namespace Acme;

use Acme\model\ProductModel;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require "../vendor/autoload.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<style>

body{

background-color: green;
padding: 0;
margin: 0;
display: flex;
justify-items: center ;
align-items: center;
justify-content: center;
height: 2500px;
}

div{

width: 120px;
height: 60px;
justify-items: center;
align-items: center;
margin: 50px;
}

a{
background-color: blue;
margin: 20px;
padding: 20px;
border-radius: 20px;
color: brown;
text-decoration: none;

}

a:hover{

background-color: white;

}
 
        button {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
 
        button:hover {
            background-color: red;
        }



</style>





<form action="bestellingdoorvoeren.php" method="post">
    <?php

    // QUESTION: Wat doet ?? in de code-regel hier onder?
    // Antwoord:
    $idTafel = $_GET['idtafel'] ?? false;
    if ($idTafel) {
        echo "<input type='hidden' name='idtafel' value='$idTafel'>";

        // TODO: alle producten ophalen uit de database en als inputs laten zien (maak gebruik van ProductModel class)
        // Zoiets als dit:

        $pro= new ProductModel();

        $products = $pro->getAll();

        foreach ($products as $product ) {
            
            $idproduct = $product->getColumnValue('idproduct');
            $naam = $product->getColumnValue('naam');

            echo "<div>";
            echo "<label><input type='checkbox' name='products[]' value='{$idproduct}'>{$naam}</label>";
            echo "<label>Aantal:<input type='number' name='product{$idproduct}'></label>";
            echo "</div>";
        }
        echo "<button>Volgende</button>";
    } else {
        // QUESTION: Wat gebeurt hier?
        // Antwoord:
        http_response_code(404);
        include('error_404.php');
        die();
    }
    ?>

</form>
</body>
</html>
