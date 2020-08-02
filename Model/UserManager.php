<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class UserManager extends Database
{ 

    public function getUser($userId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, user_login, user_password, user_email, user_creation FROM user WHERE user_id = ?');
        $req->execute(array($userId));

        return $this->hydrate($req->fetch());
    }

    public function getUsers() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, user_login, user_password, user_email, user_creation FROM user'); // formater la date dans la vue + table avec 5 champs
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
        $secure_pass = password_hash($userClean['userPassword'], PASSWORD_BCRYPT);

        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user(user_login, user_password, user_email, user_creation) VALUES (?, ?, ?, NOW())');
        $req->execute(array($userClean['userLogin'], $secure_pass, $userClean['userEmail']));

var_dump($secure_pass);
//die;
        return $bdd->lastInsertId();
    }

    public function modify($userId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET user_login = ?, user_password = ?, user_email = ? = NOW() WHERE user_id = ?');//a voir
        
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
        $req = $bdd->prepare('DELETE FROM user WHERE user_id = ?');
        
        return $req->execute(array($userId));
    }

    public function hydrate($data)
    {
       // var_dump($data);
        /*var_dump(new DateTime());
        var_dump(new DateTime($data['user_creation']));*/
        $user = new User();
        $user
            ->setId($data['user_id'])
            ->setLogin($data['user_login']) 
            ->setPassword($data['user_password'])
            ->setEmail($data['user_email'])
            ->setCreationDate(new DateTime($data['user_creation']))
        ;

        var_dump($user);
        return $user;
    }
}