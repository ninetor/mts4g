<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class MainView extends View{
    public $_folderPage = "main";

	public function showMain()
	{
        return $this->createWithTemplate("{$this->_folderPage}/index.html",true);
	}

	public function showSpecification()
	{
        return $this->createWithTemplate("{$this->_folderPage}/specification.html");
	}

	public function showMembers()
	{
        return $this->createWithTemplate("{$this->_folderPage}/members.html");
	}

	public function showWinners()
	{
        return $this->createWithTemplate("{$this->_folderPage}/winners.html");
	}
}