<?php
require '../vendor/autoload.php';
require '../src/config/db.php';

// Create and configure Slim app
$app = new \Slim\App;

//Rotas dos clientes
require '../src/routes/clients.php';

// Run app
$app->run();