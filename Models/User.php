<?php
//namespace Models;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer{
   public function __construct(){
       parent::__construct('nomes',["nome"],"id",false);//nome da tabela,nome dos campos requireds, primarykey,se ha os dadso de data de criação e modificação
   }
}
