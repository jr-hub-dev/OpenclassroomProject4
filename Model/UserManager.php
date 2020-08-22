<?php

namespace App\Model;

use App\Model\Database;
use DateTime;

class UserManager extends Database
{ 

    public function getUser($userId) 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, login, password, email, creation FROM user WHERE id = ?');
        $req->execute(array($userId));

        return $this->hydrate($req->fetch());
    }

    public function getUsers() 
    {   
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, login, password, email, creation FROM user'); // formater la date dans la vue + table avec 5 champs
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
    public function checkUser($userClean){
        $login = 'jerome';
        $password = 'passe';
        
        if(isset($userClean) && !empty($userClean['login']) && !empty($userClean['password'])){
            if(($userClean['login'])=== $login && ($userClean['password'])=== $password){
                session_start();
                session_status(1);
                echo 'Authentifié';
            } else{
                header ('location: index.php?action=home');
            }
        }

    }
    /*public function checkUser($userClean)
    { 
        //$userLogin = $userClean['userLogin'];
        //$userPassword = $userClean['userPassword'];
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id, login, password, email, creation FROM user WHERE login = $userLogin AND password = $userPassword');
        $req->execute(array($userClean));
        //$row = mysqli_fetch_array($req) or die(mysqli_error($bdd));
        $row = mysqli_query($bdd,$req);
        while ($row=mysqli_fetch_array($req)){
            if ($row['login'] == $userClean['login'] && $row['password'] == $userClean['userPassword']){ //if ($result)?
                echo "login ok";
            } else {
                echo "login error";
            }
        }
    }*/

    public function create($userClean)
    {
        $secure_pass = password_hash($userClean['userPassword'], PASSWORD_BCRYPT);

        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user(login, password, email, creation) VALUES (?, ?, ?, NOW())');
        $req->execute(array($userClean['userLogin'], $secure_pass, $userClean['userEmail']));

var_dump($secure_pass);
//die;
        return $bdd->lastInsertId();
    }

    public function modify($userId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET login = ?, password = ?, email = ? = NOW() WHERE id = ?');//a voir
        
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
        $req = $bdd->prepare('DELETE FROM user WHERE id = ?');
        
        return $req->execute(array($userId));
    }

    public function hydrate($data)
    {
       // var_dump($data);
        /*var_dump(new DateTime());
        var_dump(new DateTime($data['creation']));*/
        $user = new User();
        $user
            ->setId($data['id'])
            ->setLogin($data['login']) 
            ->setPassword($data['password'])
            ->setEmail($data['email'])
            ->setCreationDate(new DateTime($data['creation']))
        ;

        var_dump($user);
        return $user;
    }
}