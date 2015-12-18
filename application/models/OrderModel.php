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

    public function setUTF()
    {
//        $this->_pdo->query("delete from smartphonesparameters WHERE IdSmartphone IN (20,21,22,23,24,25,26,27,28,29,30,31,32,33)")->execute();

        $sql3 = "INSERT INTO smartphonesparameters (IdParameter, IdSmartphone, Text) VALUES
  ('1','20','Поддержка'),
  ('2','20','Дисплей 5\"'),
  ('3','20','2 SIM-карты'),
  ('4','20','Камера 13 Мп'),
  ('5','20','Аккумулятор 2500 mAh'),

  ('1','21','Поддержка'),
  ('2','21','Дисплей 5.5\"'),
  ('3','21','2 SIM-карты'),
  ('4','21','Камера 13 Мп'),
  ('5','21','Аккумулятор 3000 mAh'),

  ('1','22','Поддержка'),
  ('2','22','Дисплей 5\"'),
  ('3','22','2 SIM-карты'),
  ('4','22','Камера 13 Мп'),
  ('5','22','Аккумулятор 4000 mAh'),

  ('1','23','Поддержка'),
  ('2','23','Дисплей 5\"'),
  ('3','23','2 SIM-карты'),
  ('4','23','Камера 8 Мп'),
  ('5','23','Аккумулятор 2300 mAh'),

  ('1','24','Поддержка'),
  ('2','24','Дисплей 5.5\"'),
  ('3','24','2 SIM-карты'),
  ('4','24','Камера 13 Мп'),
  ('5','24','Аккумулятор 5000 mAh'),
  ('6','24','Сканер отпечатка пальца'),

  ('1','25','Поддержка'),
  ('2','25','Дисплей 5.1\"'),
  ('3','25','2 SIM-карты'),
  ('4','25','Камера 16 Мп'),
  ('5','25','Аккумулятор 2550 mAh'),
  ('6','25','Сканер отпечатка пальца'),

  ('1','26','Поддержка'),
  ('2','26','Дисплей 5.7\"'),
  ('4','26','Камера 16 Мп'),
  ('5','26','Аккумулятор 3000 mAh'),
  ('6','26','Сканер отпечатка пальца'),

  ('1','27','Поддержка'),
  ('2','27','Дисплей 4.5\"'),
  ('3','27','2 SIM-карты'),
  ('4','27','Камера 8 Мп'),
  ('5','27','Аккумулятор 1900 mAh'),

  ('1','28','Поддержка'),
  ('2','28','Дисплей 4.3\"'),
  ('3','28','2 SIM-карты'),
  ('4','28','Камера 5 Мп'),
  ('5','28','Аккумулятор 1850 mAh'),

  ('1','29','Поддержка'),
  ('2','29','Дисплей 4\"'),
  ('4','29','Камера 8 Мп'),
  ('5','29','Аккумулятор 1560 mAh'),

  ('1','30','Поддержка'),
  ('2','30','Дисплей 5.1\"'),
  ('3','30','2 SIM-карты'),
  ('4','30','Камера 16 Мп'),
  ('5','30','Аккумулятор 2600 mAh'),
  ('6','30','Сканер отпечатка пальца'),

  ('1','31','Поддержка'),
  ('2','31','Дисплей 5.5\"'),
  ('3','31','2 SIM-карты'),
  ('4','31','Камера 13 Мп'),
  ('5','31','Аккумулятор 2910 mAh'),

  ('1','32','Поддержка'),
  ('2','32','Дисплей 4.5\"'),
  ('4','32','Камера 5 Мп'),
  ('5','32','Аккумулятор 2000 mAh'),

  ('1','33','Поддержка'),
  ('2','33','Дисплей 4.7\"'),
  ('4','33','Камера 13 Мп'),
  ('5','33','Аккумулятор 2000 mAh')";

        $this->_pdo->query($sql3)->execute();
    }


}