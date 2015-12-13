<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class OrderModel extends Model {

	public function addOrder($text,$type_id,$image = null)
	{
		$query = $this->_pdo->prepare("INSERT INTO `order` (Text, TypeId, Image) VALUES (:Text, :TypeId, :Image)");
		$query->bindParam(':Text', $text);
		$query->bindParam(':TypeId', $type_id);
		$query->bindParam(':Image', $image);
		$add = $query->execute();
		if ($add)
		{
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