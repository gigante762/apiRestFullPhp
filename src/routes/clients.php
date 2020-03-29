<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app = new \Slim\App;


//GET para pegar todos os dados
$app->get('/api/nomes', function(Request $request,Response $response){
    $sql = "select * from nomes";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        }else{
            echo json_encode("Base da dados vazia");
        }
        $resultado = null;
        $db = null;

    } catch (PDOException $e){
        echo('a');
        echo ('{"error:": {"text":'.$e->getMessage().'}');
    }
});

//GET pelo id 
$app->get('/api/nomes/{id}', function(Request $request,Response $response){
    $id = $request->getAttribute('id');
    $sql = "select * from nomes where id = $id";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($usuarios);
        }else{
            echo json_encode("Base da dados vazia");
        }
        $resultado = null;
        $db = null;

    } catch (PDOException $e){
        echo('a');
        echo ('{"error:": {"text":'.$e->getMessage().'}');
    }
});

//POST criar novo usuario
$app->post('/api/nomes/novo', function(Request $request,Response $response){
    $nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    
    $sql = "INSERT INTO nomes(nome) values(:nome)"; // coloca o ':' antes da variavel
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql); //prepara a query


        $resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);

        $resultado->execute(); // execuçã oda query
        echo json_encode("Novo usuário adicionado.");


        $resultado = null;
        $db = null;

    } catch (PDOException $e){
        echo('a');
        echo ('{"error:": {"text":'.$e->getMessage().'}');
    }
});

//PUT modificar usuario
$app->post('/api/nomes/{id}', function(Request $request,Response $response){
    $id = $request->getAttribute('id');
    $nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    //$nome = $request->getParam('nome');
    
    $sql = "UPDATE nomes SET 
            nome = :nome 
            WHERE id = $id"; // coloca o ':' antes da variavel
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql); //prepara a query


        $resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);
        //$resultado->bindParam(':nome',$nome);

        $resultado->execute(); // execuçã oda query
        echo json_encode("Dados do usuário modificado.");


        $resultado = null;
        $db = null;

    } catch (PDOException $e){
        echo('a');
        echo ('{"error:": {"text":'.$e->getMessage().'}');
    }
});


