<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class MainController extends Controller
{
    public $_errorAction = "errorAction";
    public $_defaultAction = "indexAction";
    public function errorAction(){var_dump("Sorry. Error.");}
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

    public function steponeAction()
    {
        $values = [];
        parse_str(htmlspecialchars_decode($_POST['form']), $values);
        if ($values['message'] && $values['type'])
        {
            $model = new OrderModel();
            $save = $model->addOrder($values['message'],$values['type']);

            echo json_encode(['success'=> $save ? 1 : 0, 'id'=>$save]);
        }
        else
          echo json_encode(['success'=>0]);
    }

}