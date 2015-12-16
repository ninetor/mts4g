<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class AdminView extends View
{
    public function showMain($params)
    {
        $contentFile = $this->_controller->createHTML("/{$this->_viewFolder}/{$this->_folderPage}/index.php",['phones'=>$params['phones']]);
        $top_info =  $this->_controller->createHTML("{$this->_viewFolder}/{$this->_partialsFolder}/{$this->_topInfoFile}",['count'=>$params['count']]);
        return $this->createWithTemplate($contentFile,true,$top_info);
    }
}