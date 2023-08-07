<?php
// search.php
require_once('config.php');

// Get the search query from the AJAX request
$searchQuery = $_GET['q'];


// $locations= locations();

$locations = array(
    'Santo Domingo',
    "Santo Domingo Oeste",
    "Santo Domingo Norte",
    "La Romana",
    "San Pedro de Macorís",
    "San Cristóbal",
    "Puerto Plata",
    "Salvaleón de Higüey",
    "Bonao",
    "Mao (Valverde)",
    "San Juan de la Maguana",
    "Baní",
    "Moca",
    "Azua",
    "Hato Mayor del Rey",
    "Cotuí",
    'Santiago',
    'La Romana',
    'San Francisco de Macorís',
    'Salvaleón de Higüey',
    'Concepción de La Vega',
    'La Vega'
);


// Filter the locations 
$searchResults = array_filter($locations, function ($location) use ($searchQuery) {
    return stripos($location, $searchQuery) !== false;
});

// Return the results as JSON
echo json_encode($searchResults);