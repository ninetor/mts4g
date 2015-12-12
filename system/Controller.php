<?php
if(!defined("USE_HOST"))// Условие проверяющее возможность прямого доступа.
	die("Прямой доступ запрещен!");// В случае прямого доступа вывод сообщения.

class Controller{
	public $_errorAction = "";// Имя модели поведения при возникновения 404-й ошибки.
	public $_defaultAction = "";// Имя модели поведения по умолчанию.
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