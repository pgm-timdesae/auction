<?php

class Auction extends BaseModel {

    protected $table = 'auction';
    protected $pk = 'id';

    private function getAll($name = '') {

        global $db;

        $exec_var = [];
    
        if($name) {
            $sql = "SELECT * 
            FROM `auction`
            WHERE `name` LIKE ? ";

            $exec_var[] = "%$name%";
    
        } else {
            $sql = 'SELECT * 
            FROM `auction`';
        }
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute($exec_var);
        $auctions = $pdo_statement->fetchAll();

        return $auctions;
    }

    static public function getSearch($name = '', $gender) {
        global $db;

        $exec_var = [];

        $sql = "SELECT * FROM auction WHERE true";

        if($name) { 
            
            $sql = "SELECT * 
            FROM `auction`
            WHERE `name` LIKE ? ";

            $exec_var[] = "%$name%";
        }

        elseif ($gender) {
            $sql = "SELECT * 
            FROM auction
            WHERE gender='$gender' ";

            $exec_var[] = "%$gender%";
        }
        
        else {
            $sql = 'SELECT * 
            FROM `auction`';
        }
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute($exec_var);
        $auctions = $pdo_statement->fetchAll();

        return $auctions;
    }

    public static function getBidById( int $id ) {
        global $db;

        //id for bid
        //print_r($id);

        $sql = 'SELECT * 
        FROM `bid` 
        WHERE `auction_id` = :p_id
        ORDER BY `amount` DESC';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        return $pdo_statement->fetchObject();
    }

    public static function placeBid(int $bid, $id) {
        global $db;

        $sql = 'INSERT INTO bid (profile_id, auction_id, amount)
        VALUES ( :profile_id, :auction_id, :amount ) 
        ';

        $pdo_statement = $db->prepare($sql);
        $result = $pdo_statement->execute(
            [
                ':profile_id' => $_SESSION['user_id'],
                ':auction_id' => $id,
                ':amount' => $bid,
            ]
        );
    }

    public static function putQuestion($id, $question) {
        global $db;

        $sql = 'INSERT INTO comments (profile_id, auction_id, description)
        VALUES ( :profile_id, :auction_id, :description ) 
        ';

        $pdo_statement = $db->prepare($sql);
        $result = $pdo_statement->execute(
            [
                ':profile_id' => $_SESSION['user_id'],
                ':auction_id' => $id,
                ':description' => $question,
            ]
        );
    }

    public static function getMessages( int $id ) {
        global $db;

        $sql = 'SELECT * 
        FROM `comments` 
        INNER JOIN `profiles` ON  `comments` . `profile_id` = `profiles` . `id`
        WHERE `auction_id` = :p_id
        ORDER BY `created_on` DESC';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        return $pdo_statement->fetchAll();
    }
}