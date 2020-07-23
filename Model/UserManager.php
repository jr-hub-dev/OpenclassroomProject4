<?php

namespace App\Model;

use App\Model\Database;

class UserManager extends Database
{ 

    public function getUser($userId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, userLogin, userPassword, userEmail FROM users WHERE id = ?');
        $req->execute(array($userId));

        return $this->hydrate($req->fetch());
    }

    public function getUsers() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, userLogin, userPassword, userEmail FROM users'); // formater la date dans la vue + table avec 5 champs
        $req->execute();
        $result = $req->fetchAll();
        //var_dump($result);

        $users = [];
        foreach ($result as $user) {
            //var_dump($post);
            $users[] = $this->hydrate($user);
        }
        
        return $users;
    }

    public function create($userClean)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(userLogin, userPassword, userEmail) VALUES (?, ?, NOW(), NOW())');
        $req->execute(array($userClean['userLogin'], $userClean['userPassword'], $userClean['userEmail']));

        return $bdd->lastInsertId();
    }

    public function modify($userId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE users SET userLogin = ?, userPassword = ?, userEmail = ? = NOW() WHERE id = ?');//a voir
        
        return $req->execute(array(
            $userClean['userLogin'] = $_POST['userLogin'], 
            $userClean['userPassword']= $_POST['userPassword'], 
            $userClean['userEmail'] = $_POST['userEmail'], 
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
       // var_dump($data);
        /*var_dump(new DateTime());
        var_dump(new DateTime($data['creationDate']));*/
        $user = new User();
        $user
            ->setId($data['id'])
            ->setLogin($data['userLogin']) 
            ->setPassword($data['userPassword'])
            ->setEmail($data['userEmail'])
        ;
        return $user;
    }
}