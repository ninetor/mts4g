<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class MainController extends Controller
{
    public $_errorAction = "errorAction";
    public $_defaultAction = "indexAction";
    public function errorAction(){
        var_dump("Sorry. Error.");
    }
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


    public function setphoneAction()
    {
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        if ($phone && $id)
        {
            $model = new OrderModel();
            $save = $model->setPhone($id, $phone);
            echo json_encode(['success'=>$save ? 1 : 0]);
        }
        die;
    }

    public function createorderAction()
    {
        $values = $_POST;
        if ($values['message'] && $values['type'])
        {
            $values['image'] = null;
            if ($_FILES){
                $uploaddir = "{$_SERVER['DOCUMENT_ROOT']}/uploads/";
                $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {//upload this
                    $image  = "uploads/".$_FILES['image']['name'];
                }
                else
                {
                    $image = "application/templates/img/content/top-logo.png";
                }

                $values['image']  = $_SERVER['HTTP_HOST']."/".$image;
            }
            $model = new OrderModel();
            $save = $model->addOrder($values['message'],$values['type'], $values['image']);
            if ($save)
            {
                $values['id'] = $save;
                echo json_encode(['success'=>1, 'object' => $values]);
            }
            else
            {
                echo json_encode(['success'=>0]);
            }
        }
        else
          echo json_encode(['success'=>0]);

        return true;
    }

}