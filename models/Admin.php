<?php
//require_once 'app.php';

class Admin extends BaseModel {
    
    public static function getHighestBids() {
        global $db;

        $sql = 'SELECT * 
        FROM bid
        INNER JOIN profiles ON  bid . profile_id = profiles . id
        ORDER BY amount DESC
        LIMIT 5';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }

    public static function totalBids() {
        global $db;

        $sql = 'SELECT COUNT(*) FROM bid';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }

    public static function totalUsers() {
        global $db;

        $sql = 'SELECT COUNT(*) FROM profiles';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }

    public static function totalQuestions() {
        global $db;

        $sql = 'SELECT COUNT(*) FROM comments';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        return $pdo_statement->fetchAll();
    }
}