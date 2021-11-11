<?php

//require_once '/views/login/index.php';

class User extends BaseModel {
    function createUser($user) {
        global $db;

        foreach($user as $property => &$value){
            if ($property != ':pwd'){
                $value = htmlspecialchars($value);
            }
        }

        $sql = "INSERT INTO `profiles` (`firstname`, `lastname`, `email`, `password`)
                VALUES (:firstname, :lastname, :email, :pwd)";

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':email' => $this->email,
                ':pwd' => $this->pwd 
            ]
        );

        return $db->lastInsertId();
    }

    public function emailExists($email){
        global $db;

        $sql = "SELECT COUNT(email) FROM profiles WHERE email = ?";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ $email ]);
        $numberOfUsers = (int) $pdo_statement->fetchColumn();
        return ($numberOfUsers > 0);
    }

    function updateUser($user) {
        global $db;
    
        foreach($user as $property => &$value) {
            //Transform special chars to html entities 
            //to prevent XSS attack
            if($property != ':pwd') {
                $value = htmlspecialchars($value);
            }
        }
    
        $sql = "UPDATE `profiles` 
                SET `firstname` = :firstname, 
                `lastname` = :lastname,
                `email` = :email
                WHERE `id` = :id";
    
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute( 
            [
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':email' => $this->email,
                ':id' => $this->id,
            ]
         );
    }

    public static function getUserById($user_id){
        global $db;
        
        $sql = "SELECT * FROM profiles WHERE id = ?";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ $user_id ] );
        $obj = $pdo_statement->fetchObject();

        $user = new User;

        $user->firstname = $obj->firstname;
        $user->lastname = $obj->lastname;
        $user->email = $obj->email;

        return $user;
    }
}