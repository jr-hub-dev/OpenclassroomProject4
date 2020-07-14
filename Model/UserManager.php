<?php

namespace App\Model;

use App\Model\Database;

class UserManager extends Database
{ 

    public function getUser($userId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, userLogin, userPassword, userEmail FROM users WHERE id = ?'); // formater la date dans la vue + table avec 5 champs
        $req->execute(array($userId));

        return $this->hydrate($req->fetch());
    }

    public function create($userLogin, $userPassword, $userEmail)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(userLogin, userPassword, userEmail) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($userLogin, $userPassword, $userEmail));

        return $bdd->lastInsertId();
    }

    public function modify($userID)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE users SET userLogin = ?, userPassword = ?, userEmail = ? = NOW() WHERE id = ?');//a voir
        
        return $req->execute(array(
            $_POST['userLogin'], 
            $_POST['userPassword'], 
            $_POST['userEmail'], 
            $userId
        ));

    }

    public function delete($userId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
        
        return $req->execute(array($userId));
    }

    public function hydrate($data)
    {
        /*var_dump($data);
        var_dump(new DateTime());
        var_dump(new DateTime($data['creationDate']));*/
        $user = new User();
        $user
            ->setId($data['id'])
            ->setUserLogin($data['userLogin']) 
            ->setUserPassword($data['userPassword'])
            ->setUserEmail($data['userEmail'])
        ;
        //var_dump($post);
        return $user;
    }
}