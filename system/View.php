<?php
if (!defined("USE_HOST"))// Условие проверяющее возможность прямого доступа.
    die("Прямой доступ запрещен!");// В случае прямого доступа вывод сообщения.

class View
{
    private $_unsetParams = array();// Массив, в каком создаться новые переменные при помощи вошебного метода __set.

    function __set($name, $value)
    {// Метод, вызываемый при присваиванию значения неизвестному свойству.
        $this->_unsetParams[$name] = $value;// Создаться элемент массива с ключом равным имени неизвестного свойства.
    }

    function __get($name)
    {// Метод, вызываемый при обращении к неизвестному свойству.
        if (isset($this->_unsetParams[$name]))// Действия, если в массиве обнаружен элемент с ключом как и имя неизвестного свойства.
            return $this->_unsetParams[$name];// Возвращается значение из массива.
        return null;// Если в массиве нет значения возвращается null.
    }

    function bind($name, &$value)
    {// Метод создания ссылки на передаваемую переменную.
        $this->_unsetParams[$name] = &$value;// В массиве создается элемент - ссылка на переданную переменную.
    }

    function issetf($name)
    {// Метод, проверки существования элемента с ключом $name.
        if (isset($this->_unsetParams[$name]))// Действия, если элемент существует.
            return true;// Возвращается true если элемент существует.
        return false;// Возвращается false если элемент не существует.
    }

    /**
     * @var $_controller FrontController
     */
    protected $_controller = null;

    protected $_viewFolder = "views";
    protected $_partialsFolder = "partials";

    protected $_headerFile = "header.html";
    protected $_menuFile = "_menu.php";
    protected $_topFile = "_top.html";
    protected $_topInfoFile = "_top_info.html";
    protected $_mainFile = "main.php";
    protected $_footerFile = "footer.html";
    protected $_additionFile = "_addition.html";

    protected $_folderPage = null;

    public function init()
    {
        $this->_controller = FrontController::getInstance();
    }

    public function __construct()
    {
        $this->init();
    }

    public function createWithTemplate($contentFile, $isMain = false, $top_info = null)
    {
        /**
         * the partials of page HTML
         */
        $headerFile = $this->_controller->createHTML("{$this->_viewFolder}/{$this->_headerFile}");
        $footerFile = $this->_controller->createHTML("{$this->_viewFolder}/{$this->_footerFile}");
        /**
         * the partials of page
         */
        $additionFile = $this->_controller->createHTML("{$this->_viewFolder}/{$this->_partialsFolder}/{$this->_additionFile}");
        $menuFile = $this->_controller->createHTML("{$this->_viewFolder}/{$this->_partialsFolder}/{$this->_menuFile}", [
            'urlMenu' => $isMain ? null : "/",
            'isMain' => $isMain,
            'isShare' => $_SERVER['REQUEST_URI']=="/shares",
            'host' => $_SERVER['HTTP_HOST']]);

        $topFile = $this->_controller->createHTML("{$this->_viewFolder}/{$this->_partialsFolder}/{$this->_topFile}", ['menu' => $menuFile, 'info' => $top_info]);

        return $this->_controller->createHTML("{$this->_viewFolder}/{$this->_mainFile}", [
            'header' => $headerFile,
            'content' => $contentFile,
            'top' => $topFile,
            'footer' => $footerFile,
            'addition' => $additionFile,
            'host' => $_SERVER['HTTP_HOST'],
        ]);
    }
}