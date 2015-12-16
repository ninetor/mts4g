<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class AdminController extends Controller
{
    public $_errorAction = "errorAction";
    public $_defaultAction = "loginAction";
    public function errorAction(){
        var_dump("Sorry. Error.");
    }

    public function adminAction()
    {
        header("Location: /admin/login");
        die;
    }
    public function loginAction()
    {
        var_dump(123);
        die;
//        return va$this->_controller->setPage($view->showMain(['count'=>$modelOrder->getCount(), 'phones' => $phones]));
    }
    public function ordersAction()
    {
        var_dump(3);
        die;
//        return va$this->_controller->setPage($view->showMain(['count'=>$modelOrder->getCount(), 'phones' => $phones]));
    }

}