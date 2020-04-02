<?php
require "../src/config/db.php";
require "../vendor/autoload.php";

require "../Models/User.php";

//use Models\User;
use CoffeeCode\DataLayer\Connect;

$conn = Connect::getInstance();
$error = Connect::getError();

//$user  = new User();
echo('<pre>');
/*
$list = $user->find()->fetch(true);

foreach ($list as $userItem){
    var_dump($userItem->id);
}
*/

/*
//Create
//NOTA: O comando save é o active record, quando não há registro, o save server para criar;

$user  = new User();
$user->nome = "DataLayer";
$user->save();
*/

/*
//Update
//NOTA: O comando save é o active record, quando há registro, o save server para atualizar;
//$user  = new User();
//$userComId5 = $user->findById(5);//para pegar o id ou
//$userComId5->nome = "DataLayer2";
//$userComId5->save();

$user  = (new User())->findById(5);//já pega o user com o id 5
$user->nome = "DataLayer";
$user->save();
*/


/*
//Delete
$user  = (new User())->findById(5);

if($user){
    $user->destroy();
}else{
    var_dump($user);
}
*/
