<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class OrderModel extends Model
{

    public function addOrder($text, $type_id, $social, $image = null)
    {
        $query = $this->_pdo->prepare("INSERT INTO `order` (Text, TypeId, Social, Image) VALUES (:Text, :TypeId, :Social, :Image)");
        $query->bindParam(':Text', $text);
        $query->bindParam(':TypeId', $type_id);
        $query->bindParam(':Social', $social);
        $query->bindParam(':Image', $image);
        $add = $query->execute();
        if ($add) {
            return $this->_pdo->lastInsertId();
        }
        return false;
    }

    public function setPhone($id, $phone)
    {
        $query = $this->_pdo->prepare("Update `order` set Phone = :Phone where id = :id");
        $query->bindParam(':Phone', $phone);
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function setWinner($id, $active)
    {
        $sqlwinnersweek = "SELECT Title,id FROM `winnersweek` WHERE active = 1 ";
        $winnersweekquery = $this->_pdo->prepare($sqlwinnersweek);
        $winnersweekquery->execute();
        $week = $winnersweekquery->fetch();

        if (!$active)
        {
                $query = $this->_pdo->prepare("INSERT INTO `winnersweekorder` (IdWinnersWeek, IdOrder) VALUES (:IdWinnersWeek,:IdOrder)");
                $query->bindParam(':IdWinnersWeek', $week['id']);
                $query->bindParam(':IdOrder', $id);
            return $query->execute();
        }
        else
        {
            $query = $this->_pdo->prepare("Delete from `winnersweekorder` WHERE IdOrder = :id AND IdWinnersWeek = :IdWinnersWeek");
            $query->bindParam(':id', $id);
            $query->bindParam(':IdWinnersWeek',  $week['id']);
            return $query->execute();
        }
    }

    public function getCount()
    {
        $sql = "SELECT count(*) FROM `order` WHERE active = 1";
        $result = $this->_pdo->prepare($sql);
        $result->execute();
        return $result->fetchColumn();
    }

    public function getMembers($addQuery = "")
    {
        $sql = "SELECT * FROM `order` WHERE active = 1 {$addQuery}";
        $result = $this->_pdo->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }

    public function getWinnersWeek()
    {
        $sqlwinnersweek = "SELECT Title,id FROM `winnersweek` WHERE active = 1 ";
        $winnersweekquery = $this->_pdo->prepare($sqlwinnersweek);
        $winnersweekquery->execute();
       return  $winnersweekquery->fetch();
    }


    public function getWinners()
    {
        $winnersweek = $this->getWinnersWeek();

        if ($winnersweek) {
            $sqlwinners = "SELECT `order`.* FROM winnersweekorder
                            Left join `order` ON `order`.id = winnersweekorder.IdOrder
                            WHERE IdWinnersWeek = :IdWinnersWeek";
            $winners = $this->_pdo->prepare($sqlwinners);
            $winners->bindParam(':IdWinnersWeek', $winnersweek['id']);
            $winners->execute();
            return ['Title' => $winnersweek['Title'], 'winners' => $winners->fetchAll()];
        }
		return ['Title' => null, 'winners' => null];
    }

    public function getWeekId($id)
    {
        $sqlwinnersweek = "SELECT Title,id FROM `winnersweek` WHERE id = :id ";
        $winnersweekquery = $this->_pdo->prepare($sqlwinnersweek);
        $winnersweekquery->bindParam(':id', $id);
        $winnersweekquery->execute();
       return  $winnersweekquery->fetch();
    }


    public function getWinnersWeekId($id)
    {
        $winnersweek = $this->getWeekId($id);

        if ($winnersweek) {
            $sqlwinners = "SELECT `order`.* FROM winnersweekorder
                            Left join `order` ON `order`.id = winnersweekorder.IdOrder
                            WHERE IdWinnersWeek = :IdWinnersWeek";
            $winners = $this->_pdo->prepare($sqlwinners);
            $winners->bindParam(':IdWinnersWeek', $winnersweek['id']);
            $winners->execute();
            return ['Title' => $winnersweek['Title'], 'winners' => $winners->fetchAll()];
        }
		return ['Title' => null, 'winners' => null];
    }




    public function getWinnersIds()
    {
        $winnersweek = $this->getWinnersWeek();
        $result = ['week'=>$winnersweek, 'winners' =>null];
        if ($winnersweek) {
            $sqlwinners = "SELECT `order`.id FROM winnersweekorder
                            Left join `order` ON `order`.id = winnersweekorder.IdOrder
                            WHERE IdWinnersWeek = :IdWinnersWeek";
            $winners = $this->_pdo->prepare($sqlwinners);
            $winners->bindParam(':IdWinnersWeek', $winnersweek['id']);
            $winners->execute();
            $result['winners'] = $winners->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
        }
        return $result;
    }




    public function getOrders($addQueryWhere = "", $addQuery = "")
    {
        try {
            $query = $this->_pdo->query('SELECT * from `order` '.$addQueryWhere.' ORDER BY Created desc '.$addQuery);
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function removeOrder($id)
    {
        try {
            $query = $this->_pdo->prepare('Delete from `order` WHERE id = :id');
            $query->bindParam(':id', $id);
            return $query->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function removeWeek($id)
    {
        try {
            $query = $this->_pdo->prepare('Delete from `winnersweek` WHERE id = :id');
            $query->bindParam(':id', $id);
            return $query->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function getWeeks()
    {
        try {
            $query = $this->_pdo->query('SELECT * from `winnersweek` ORDER BY Active desc, Created desc ');
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    public function addWeeks($title)
    {
        try {
            $query = $this->_pdo->prepare("INSERT INTO `winnersweek` (Title) VALUES (:title)");
            $query->bindParam(':title', $title);
            return $query->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}