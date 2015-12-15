<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class MainView extends View{
    public $_folderPage = "main";

	public function showMain($params)
	{
		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/index.php",['phones'=>$params['phones']]);
		$top_info =  $this->_controller->createHTML("{$this->_viewFolder}/{$this->_partialsFolder}/{$this->_topInfoFile}",['count'=>$params['count']]);
        return $this->createWithTemplate($contentFile,true,$top_info);
	}

	public function showSpecification()
	{
		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/specification.html");
        return $this->createWithTemplate($contentFile);
	}
	public function showShares()
	{
		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/actions.html");
        return $this->createWithTemplate($contentFile);
	}

	public function showMembers($params)
	{

		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/members.php",$params);
        return $this->createWithTemplate($contentFile);
	}
	public function showTest($params)
	{
		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/test.html",$params);
        return $contentFile;
	}

	public function showWinners($params)
	{
		$contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/winners.php",$params);
        return $this->createWithTemplate($contentFile);
	}
}