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
        $req = $bdd->prepare('SELECT id, login, password, email, creation FROM user');
        $req->execute();
        $result = $req->fetchAll();

        $users = [];
        foreach ($result as $user) {
            $users[] = $this->hydrate($user);
        }

        return $users;
    }

    public function checkUser($userClean)
    {
        //Définition des logs pour administrateur
        $login = "admin";
        $password = "admin";   
        $secure_pass = password_hash($password, PASSWORD_BCRYPT);
        $level = "admin";

        //Définition des logs pour simple utilisateur
        $login2 = "userr";
        $password2 = "user";   
        $secure_pass2 = password_hash($password2, PASSWORD_BCRYPT);
        $level2 = "user";

        //Vérification des login et mots de passe
        if ($userClean['userLogin'] === $login && password_verify($userClean['userPassword'], $secure_pass)) {
            $_SESSION['userLogin'] = $login;
            $_SESSION['userLevel'] = $level;

            header('Location: index.php?action=home');

        } elseif ($userClean['userLogin'] === $login2 && password_verify($userClean['userPassword'], $secure_pass2)) {
            $_SESSION['userLogin'] = $login2;
            $_SESSION['userLevel'] = $level2;

            header('Location: index.php?action=home');

        } else {
            echo 'Mauvais login ou mot de passe';
        }
    }

    function isAdmin()
    {
        //Si la sesssion existe
        if (array_key_exists('userLevel', $_SESSION)) {

            //Si l'utilisateur est bien administrateur
            if ($_SESSION['userLevel'] === "admin") {

                return "admin";
            }
            //Si l'utilisateur est simple utilisateur
            if ($_SESSION['userLevel'] === "user") {

                return "user";
            }
        }

        return false;
    }

    public function logout()
    {
        session_destroy();
        $_SESSION = [];
    }
    
    public function create($userClean)
    {
        //Cryptage du mot de passe
        $secure_pass = password_hash($userClean['userPassword'], PASSWORD_BCRYPT);

        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO user(login, password, email, creation) VALUES (?, ?, ?, NOW())');
        $req->execute(array($userClean['userLogin'], $secure_pass, $userClean['userEmail']));

        return $bdd->lastInsertId();
    }

    public function modify($userId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE user SET login = ?, password = ?, email = ? = NOW() WHERE id = ?');

        return $req->execute(array(
            $userClean['userLogin'] = $_POST['userLogin'],
            $userClean['userPassword'] = $_POST['userPassword'],
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
        $user = new User();
        $user
            ->setId($data['id'])
            ->setLogin($data['login'])
            ->setPassword($data['password'])
            ->setEmail($data['email'])
            ->setCreationDate(new DateTime($data['creation']));

        return $user;
    }
}
