<?php

use App\Exceptions\NombreException;

require "vendor\autoload.php";
$validateur = new App\Validateurs\Validateur();

try {
    $validateur->verifierNombre(10);
    echo "Le nombre est positif";
} catch (NombreException $exception) {
    echo $exception->getMessage();
}

echo "\n";

try {
    $validateur->verifierNombre(-10);
    echo "Le nombre est positif";
} catch (NombreException $exception) {
    echo $exception->getMessage();
}
