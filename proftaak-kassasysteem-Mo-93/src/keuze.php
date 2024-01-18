<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toevoegen of afrekenen</title>
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
    border-radius: 20px;
    color: brown;
    text-decoration: none;

}

a:hover{

    background-color: white;

}

</style>

<body>
<?php
$idTafel = $_GET['idtafel'] ?? false;
if ($idTafel) {
    echo "<div><a href='product.php?idtafel={$idTafel}'>toevoegen</a></div>";
    echo "<div><a href='rekening.php?idtafel={$idTafel}'>afrekenen</a></div>";
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}
?>
</body>
</html>