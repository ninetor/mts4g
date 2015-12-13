<?php
if(!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
	die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

$serverName = "";// доменное имя сайта

$onProduction = true;// переменная, отвечающая за необходимость отображения системных ошибок (false - не отображать, true - отображать)
$escHTMLVariables = true;// переменная, отвечающая за замену специальных символов на HTML сущности
$useDirectRoute = false;// Переменная, отвечающая за возможность прямого доступа к методам контроллеров
 
$includes = array(// массив с именами файлов, какие будут подключены из папки application/libraries
	//"example.php",
);

$defaultController = "MainController";// имя контроллера, какой устанавливается по умолчанию, если в строке явно не указан
$errorController = "MainController";// имя контроллера, какой устанавливается, когда указанный в строке запроса контроллер не найден (обработка 404-й ошибке на уровне фреймворка)

$routingRules = array(// ассоциативный массив с маршрутами, связывающие строку запроса с котроллерами и их методами
	//пример маршрута
//	"controller/action" => "testroute",// - если после домена указано testroute строка  запроса имеет вид http://mysite.com/testroute - выполняется действие action контроллера controller, строка запроса преобразовывается в http://mysite.com/controller/action

    "main/index" => ["action" => ""],
    "main/specification" => ["action" => "specification"],
    "main/winners" => ["action" => "winners"],
    "main/members" => ["action" => "members"],
    "main/createorder" => ["action" => "createorder"],
    "main/setphone" => ["action" => "setphone"],
);