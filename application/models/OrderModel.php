<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class OrderModel extends Model {

	public function addOrder($text,$type_id)
	{
		$query = $this->_pdo->prepare("INSERT INTO `order` (Text, TypeId) VALUES (:Text, :TypeId)");
		$query->bindParam(':Text', $text);
		$query->bindParam(':TypeId', $type_id);
		$add = $query->execute();
		if ($add)
		{
			return $this->_pdo->lastInsertId();
		}
		return false;
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