<?php

use Acme\classes\Bestelling;

require "../vendor/autoload.php";

if ($idTafel = $_POST['idtafel'] ?? false) {

    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
    $bestelling = new Bestelling($idTafel);
    $bestelling->getBestelling();

    $selectedProducts = $_POST['products'] ?? [];

    // Create a new Bestelling object
    $bestelling = new Bestelling($idTafel);

    // Add the selected products to the order
    $bestelling->addProducts($selectedProducts);

    // Process and save the order to the database
    $bestelling->saveBestelling();
    

} else {
    http_response_code(404);
    include('error_404.php');
    die();
}

header("Location: index.php");