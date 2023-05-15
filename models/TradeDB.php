<?php

require_once "DBInit.php";

class TradeDB {

    public static function getAll($userId, $listId) {
        $db = DBInit::getInstance();
    
        $statement = $db->prepare("SELECT trade_id, pair, `date`, direction, stop_loss, trade_type, result, roi 
                                   FROM trade 
                                   WHERE user_id = :userId AND list_id = :listId");
        $statement->bindParam(":userId", $userId, PDO::PARAM_INT);
        $statement->bindParam(":listId", $listId, PDO::PARAM_INT);
        $statement->execute();
    
        return $statement->fetchAll();
    }
    

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT trade_id, author, title, price, year FROM trade 
            WHERE trade_id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $trade = $statement->fetch();

        if ($trade != null) {
            return $trade;
        } else {
            throw new InvalidArgumentException("Error Processing Request: $_GET[id]", 1);
        }
    }

    public static function insert($user_id, $list_id, $pair, $date, $direction, $type, $stop_loss, $result, $roi) {
        $db = DBInit::getInstance();
        try {
        $statement = $db->prepare("INSERT INTO trade (user_id, list_id, pair, date, direction, trade_type, stop_loss, result, roi)
            VALUES (:user_id, :list_id, :pair, :date, :direction, :trade_type, :stop_loss, :result, :roi)");
            $statement->bindParam(":user_id", $user_id);
            $statement->bindParam(":list_id", $list_id);
        $statement->bindParam(":pair", $pair);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":direction", $direction);
        $statement->bindParam(":trade_type", $type);
        $statement->bindParam(":stop_loss", $stop_loss);
        $statement->bindParam(":result", $result);
        $statement->bindParam(":roi", $roi);
        $statement->execute();
        }
        catch (PDOException $e) {
            return false;
        }
    }

    public static function update($id, $author, $title, $price, $year) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE trade SET author = :author,
            title = :title, price = :price, year = :year WHERE id = :id");
        $statement->bindParam(":author", $author);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":year", $year);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM trade WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }    

    public static function search($query) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, author, title, price, year FROM trade 
            WHERE author LIKE :query OR title LIKE :query");

        

        $statement->bindValue(":query", '%' . $query . '%');
        $statement->execute();

        return $statement->fetchAll();
    }    
}
