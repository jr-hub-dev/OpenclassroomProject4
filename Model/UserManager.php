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

//     public function checkUser($userClean)
//     {   $loginClean = $userClean['userLogin'];
//         $passwordClean = $userClean['userPassword'];
//         $basepass = password_hash('admin', PASSWORD_BCRYPT);
//         $basepass2 = password_hash('user', PASSWORD_BCRYPT);

//         $secure_pass = password_hash($userClean['userPassword'], PASSWORD_BCRYPT);  
//         var_dump($secure_pass);
//         //die;
//         $bdd = $this->dbConnect();
//         $req = $bdd ->prepare ('SELECT id, login, is_admin FROM user WHERE login = $loginClean');
        
//         $req->execute($userClean);
//         $resultat = $req->fetch();

//     var_dump($resultat);
//         //die;
//         if ($loginClean === $resultat('login') && password_verify($passwordClean, $basepass)) {            
//             $_SESSION['userLogin'] = $login;
//             $_SESSION['userLevel'] = $level;

//             header('Location: index.php?action=home');

// var_dump($_SESSION['userLevel']);
                               
//         }elseif ($userClean['userLogin'] === $resultat('login') && password_verify($passwordClean, $basepass2)) { 
//             $_SESSION['userLogin'] = $userClean['userLogin'];
//             $_SESSION['userLevel'] = $level2;

//             header('Location: index.php?action=home');

// var_dump($_SESSION['userLevel']);
//         }else{
//             echo 'Mauvais login ou mot de passe';        
//         }
//     }
    public function checkUser($userClean)
    {   
        $login = "admin";
        $password = "admin";   //stocker le hash puis pass hash et pass verify
        $secure_pass = password_hash($password, PASSWORD_BCRYPT);
        $level = "admin";
var_dump($secure_pass);
        
        $login2 = "userr";
        $password2 = "user";   //stocker le hash puis pass hash et pass verify
        $secure_pass2 = password_hash($password2, PASSWORD_BCRYPT);
        $level2 = "user";
var_dump($secure_pass2);
        
        if ($userClean['userLogin'] === $login && password_verify($userClean['userPassword'], $secure_pass)) {            
            $_SESSION['userLogin'] = $login;
            $_SESSION['userLevel'] = $level;

            header('Location: index.php?action=home');

var_dump($_SESSION['userLevel']);
                               
        }elseif ($userClean['userLogin'] === $login2 && password_verify($userClean['userPassword'], $secure_pass2)) { 
            $_SESSION['userLogin'] = $login2;
            $_SESSION['userLevel'] = $level2;

            header('Location: index.php?action=home');

var_dump($_SESSION['userLevel']);
        }else{
            echo 'Mauvais login ou mot de passe';        
        }
    }
    
    public function logout(){
        session_destroy();
        //$_COOKIE['PHPSESSID'] = '';
        var_dump('session fermée');
    }

    public function create($userClean)
    {
        $secure_pass = password_hash($userClean['userPassword'], PASSWORD_BCRYPT);

        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user(login, password, email, creation) VALUES (?, ?, ?, NOW())');
        $req->execute(array($userClean['userLogin'], $secure_pass, $userClean['userEmail']));

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