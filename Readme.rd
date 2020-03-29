Precisa do composer
Vamos usar o Slim http://www.slimframework.com/
> http://www.slimframework.com/docs/v3/start/installation.html

comando: composer require slim/slim:"4.*"

> http://www.slimframework.com/

codigo: ============
<?php
require '../vendor/autoload.php';

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

// Run app
$app->run();

============


cria uma pasta public e uma src
dentro da public cria um index.php e coloca o codigo.

dentro de public crie um htaccess.

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]



dentro de src cria config/db.php