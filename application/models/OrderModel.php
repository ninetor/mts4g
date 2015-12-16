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

    public function getOrders()
    {
        try {
            return $this->_pdo->query('SELECT * from order');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}