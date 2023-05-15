<?php

require_once "DBInit.php";

class UserDB {

    public static function register($name, $email, $password) {
        $db = DBInit::getInstance();
        
        $stmt = $db->prepare("SELECT * FROM user WHERE email=:email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return false;
        }
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->execute();
        
        return true;
    }

    public static function login($email, $password) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM user WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();

        $user = $statement->fetch();
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            return true;
        } else {
            return false;
        }
    }
}
?>