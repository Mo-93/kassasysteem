<?php

use Acme\classes\Rekening;
use Acme\model\ProductTafelModel;

require "../vendor/autoload.php";

$idTafel = $_GET['idtafel'] ?? null;
if ($idTafel) {
    // Instantiate the Rekening class
    $rekening = new Rekening();

    // Get the bill details using the Rekening class
    $bill = $rekening->getBill($idTafel);

    // Display the bill in a nice format
    echo "<h2> Rekening voor tafel $idTafel</h2>";
    echo "<p>Date: " . $bill['datumtijd']['formatted'] . "</p>";

    echo "<p> tijd:". $bill['datumtijd']['time']."</p>";

    echo "<ul>";
    foreach ($bill['products'] as $idProduct => $productInfo) {
        echo "<li>{$productInfo['data']['productName']} - Quantity: {$productInfo['aantal']}</li>";
    }
    echo "</ul>";

    echo "<p>Total: {$bill['totaal']}</p>";

    // Mark the order as paid
    $rekening->setPaid($idTafel);

} else {
    http_response_code(404);
    include('error_404.php');
    die();
}


