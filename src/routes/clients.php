<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use CoffeeCode\DataLayer\Connect;

require_once "../Models/User.php";

$app = new \Slim\App;

/*
    Usando com a ultima linha do .htaccess agora sempre poderemos pegar
    o valor de $_SERVER["HTTP_AUTHORIZATION"], que por valor padrão será
    igual a ".
*/


$db = Connect::getInstance();
$error = Connect::getError();


//just for test
$app->get('/api/login', function(Request $req, Response $res){
    //return $res->write('{"name":"kevin"}');
    //return $res->withHeader('total',50);
    //return $res->withStatus(201)->write('{"name":"kevin"}');
    /*
    if($_SERVER["HTTP_AUTHORIZATION"] != ''){
        echo('{"success":"Request successful"}');
        //seu codigo aqui caso esteja autorizado.
    }else{
        return $res->withStatus(401);
    }
    */
});

//Retorna todos os usuários
$app->get('/api/nomes', function(Request $request,Response $response){
    
    $user  = new User();

    $list = $user->find()->fetch(true);
    $data = array();
    foreach ($list as $userItem){
        $value = $userItem->data();
        array_push($data,$value);
    }

    return $response->write(json_encode($data))->withHeader("Content-Type","application/json");
});

//Retorna um usuário específico pelo id 
$app->get('/api/nomes/{id}', function(Request $request,Response $response){
    $id = $request->getAttribute('id');

    $data  = (new User())->findById($id)->data();

    return $response->write(json_encode($data))->withHeader("Content-Type","application/json");
});

//Criar novo usuário
$app->post('/api/nomes/novo', function(Request $request,Response $response){
    $nome = $request->getParam('nome');

    $user  = new User();
    $user->nome = $nome;
    $user->save();

    $id = $user->id;
    $strId = "{\"id\":\"$id\"}";

    return $response->write($strId)->withStatus(201);
});

//Modificar um usuário
$app->post('/api/nomes/{id}', function(Request $request,Response $response){
    $id = $request->getAttribute('id');
    $nome = $request->getParam('nome');

    $user  = (new User())->findById($id);
    $user->nome = $nome;
    $user->save();

    $response->write(json_encode($user->data()))->withStatus(201);
});

$app->get("/api/nomes/deletar/{id}",function(Request $request,Response $response){
    $id = $request->getAttribute('id');

    $user  = (new User())->findById($id);

    $id = $user->id;
    $strId = "{\"id\":\"$id\"}";

    $user->destroy();

    return $response->write($strId)->withStatus(201);
});