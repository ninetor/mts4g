<?php
// Устанавливается константа, для проверки прямого доступа к файлам.
define("USE_HOST",$_SERVER["SERVER_NAME"]."/");
// Загрузка системных классов.
require_once("system/FrontController.php");
require_once("application/Events.php");
require_once("system/Controller.php");
require_once("system/Model.php");
require_once("system/View.php");
require_once("application/config.php");

// Функция автоматической загрузки классов.
function __autoload($className){
	$filepath = "";
	if(substr($className,-10)=="Controller")// Действия, если загружается контроллер.
		$filepath = "application/controllers/".$className.".php";// Создание пути к файлу.
	if(substr($className,-5)=="Model")// Создание пути к файлу.
		$filepath = "application/models/".$className.".php";// Действия, если загружается модель.
	if(substr($className,-4)=="View")// Создание пути к файлу.
		$filepath = "application/views/".$className.".php";// Действия, если загружается представление.

	// Загрузка класса, если файл существует.
	if(file_exists($filepath))
		require_once($filepath);
}
require_once('application/classes/vk.php');

if(method_exists("Events","beforeStart"))// Проверка наличия статического метода.
	Events::beforeStart();// Вызов статического метода перед выполнением маршрутизации.
$front = FrontController::getInstance();// Get instance of FrontController.
$front->route();// Запуск приложения.

// Действия при удаленном запросе. Формируется ответ как JSON строка.
if($front->_requestType=="remote"){
	// Проверка IP на права доступа.
	$isGoodRemoteAddr = false;
	if($front->_remoteIp=="All"){// Действия если разрешены все IP адреса для удаленного системного запроса.
		$isGoodRemoteAddr = true;// Установка флага в положение, когда IP адрес разрешен.
	}else{// Действия если разрешенные IP адреса для удаленного системного запроса содержаться в массиве.
		foreach ($front->_remoteIp as $value) {
			if($value==$_SERVER["REMOTE_ADDR"]){// Действия когда IP автора запроса совпадает с разрешенным.
				$isGoodRemoteAddr = true;// Установка флага в положение, когда IP адрес разрешен.
				break;
			}
		}
	}
	if($front->_openRemoteConnect===false || $isGoodRemoteAddr==false)// Если удаленный системный запрос в действии запрещен или IP не содержится в списке разрешенных, возвращается ошибка.
		die(json_encode(array("_requestType"=>"remote","_page"=>"<strong>Application error (008): Request action open only for local use.</strong>","_requestReturnData"=>"null","_errors"=>"null","_requestStopText"=>"null")));
	die(json_encode(array("_requestType"=>"remote","_page"=>$front->getPage(),"_requestReturnData"=>$front->_requestReturnData,"_errors"=>$front->_errors,"_requestStopText"=>$front->_requestStopText)));
}
if($front->_needReturn404Error==true)// Действия, если необходимо отправить заголовки 404-й страницы.
	die($front->show404Page($front->getPage()));// Вызов метода генерации ошибки 404.
echo $front->getPage();// Возврат пользователю сгенерированной страницы.
if(method_exists("Events","shutdown"))// Если существует метод в классе событий, вызов его.
	Events::shutdown();// Вызов метода из класса событий.
?>