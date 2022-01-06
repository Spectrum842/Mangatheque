<?php

require 'C://Dev/Mangatheque/app/models/config/config.php';
require 'C://Dev/Mangatheque/app/models/database/Database.php';
require 'C://Dev/Mangatheque/app/models/Collection.php';

// Instanciation de la classe collection, puis on construit le JSON
$instanceCollection = new Collection();
$collection = $instanceCollection->getCollection($_GET['ID']);
$json_final = array(
    'response' => 'success',
    'name' => $collection[0]['name'],
    'image' => $collection[0]['image'], 
    'description' => $collection[0]['description']
);

echo json_encode($json_final);