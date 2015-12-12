<?php
if(!defined("USE_HOST"))// Условие проверяющее возможность прямого доступа.
	die("Прямой доступ запрещен!");// В случае прямого доступа вывод сообщения.

class Model{
	private $_unsetParams = array();// Массив, в каком создаться новые переменные при помощи вошебного метода __set.
	function __set($name, $value){// Метод, вызываемый при присваиванию значения неизвестному свойству.
		$this->_unsetParams[$name] = $value;// Создаться элемент массива с ключом равным имени неизвестного свойства.
	}
	function __get($name){// Метод, вызываемый при обращении к неизвестному свойству.
		if(isset($this->_unsetParams[$name]))// Действия, если в массиве обнаружен элемент с ключом как и имя неизвестного свойства.
			return $this->_unsetParams[$name];// Возвращается значение из массива.
		return null;// Если в массиве нет значения возвращается null.
	}
	function bind($name, &$value){// Метод создания ссылки на передаваемую переменную.
		$this->_unsetParams[$name] = &$value;// В массиве создается элемент - ссылка на переданную переменную.
	}
	function issetf($name){// Метод, проверки существования элемента с ключом $name.
		if(isset($this->_unsetParams[$name]))// Действия, если элемент существует.
			return true;// Возвращается true если элемент существует.
		return false;// Возвращается false если элемент не существует.
	}
	/**
	 * @var $_controller FrontController
	 */
	public $_controller = null;

	public function init()
	{
		$this->_controller = FrontController::getInstance();
	}
	public function __construct()
	{
		$this->init();
	}
}
