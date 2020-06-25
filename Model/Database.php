<?php

namespace App\Model;

use PDO;

class Database { 

  public function dbConnect()
  {  
    require_once '../Config/config.php';

        try {
          //echo 'mysql:host=' . $db['host_name'] . ';dbname=' . $db['database'] . ';', $db['user_name'], $db['password'];
          return new PDO('mysql:host=' . $db['host_name'] . ';port=' . $db['port'] . ';dbname=' . $db['database'], $db['user_name'], $db['password']);

        } catch (PDOException $e) {
          echo "Erreur!: " . $e->getMessage() . "<br/>";
          die();
        }
    }}