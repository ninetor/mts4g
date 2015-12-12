<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class MainController extends Controller
{
    public $_errorAction = "errorAction";
    public $_defaultAction = "indexAction";

    public function indexAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showMain());
    }

    public function specificationAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showSpecification());
    }
    public function membersAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showMembers());
    }

    public function winnersAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showWinners());
    }

    public function errorAction()
    {

    }
}