<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class AdminView extends View
{
    protected $_folderPage = "admin";
    public function showLogin()
    {
        return  $this->_controller->createHTML("/{$this->_viewAdminFolder}/login.php",[]);
    }


     public function showOrders($params,$action)
    {
        $contentFile = $this->_controller->createHTML("/{$this->_viewAdminFolder}/orders.php",$params);
        return $this->createWithAdminTemplate($contentFile,$action);
    }

     public function showWeeks($params,$action)
    {
        $contentFile = $this->_controller->createHTML("/{$this->_viewAdminFolder}/weeks.php",$params);
        return $this->createWithAdminTemplate($contentFile, $action);
    }
     public function showWeek($params,$action)
    {
        $contentFile = $this->_controller->createHTML("/{$this->_viewAdminFolder}/week.php",$params);
        return $this->createWithAdminTemplate($contentFile, $action);
    }
}