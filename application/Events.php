<?php
if(!defined("USE_HOST"))// Условие проверяющее возможность прямого доступа.
	die("Прямой доступ запрещен!");// В случае прямого доступа вывод сообщения.
class Events{
	public static function beforeStart(){// Метод выполняемый перед запуском.
		
	}
	public static function beforeAction(){//метод вызываемый перед выполнением указанного метода контроллера.
	
	}
	public static function shutdown(){// метод вызываемый после отправки данных пользователю.
		
	}
}