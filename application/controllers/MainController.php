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
        $model = new OrderModel();
        return $this->_controller->setPage($view->showMain(['count'=>$model->getCount()]));
    }

    public function specificationAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showSpecification());
    }

    public function membersAction()
    {
        $model = new OrderModel();
        $Allmembers = $model->getMembers();
        $countAll = count($Allmembers);
        $limit = 2;

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = pagination($countAll,$currentPage,$limit);

        $offset = $limit* ($currentPage -1);
        $addQuery = " LIMIT $limit OFFSET $offset";
        $members = $model->getMembers($addQuery);
        $view = new MainView();

        return $this->_controller->setPage($view->showMembers(['members'=>$members, 'pagination' => $pagination]));
    }

    public function winnersAction()
    {
        $model = new OrderModel();
        $winners = $model->getWinners();
        $view = new MainView();
        return $this->_controller->setPage($view->showWinners(['winners'=>$winners]));
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


    public function testAction()
    {

        $v = new Vkclass(array(
            'client_id' => 5189016, // (обязательно) номер приложения
            'secret_key' => 'nRE4ql1ddmIsGtOxOolj', // (обязательно) получить тут https://vk.com/editapp?id=12345&section=options где 12345 - client_id
            'scope' => 'wall', // права доступа
            'v' => '5.35' // не обязательно
        ));

        $url = $v->get_code_token();
        var_dump($url);
        die;
        $config['secret_key'] = 'nRE4ql1ddmIsGtOxOolj';
        $config['client_id'] = 5189016; // номер приложения
        $config['access_token'] = 'ваш токен доступа';
        $config['scope'] = 'wall,photos,video'; // права доступа к методам (для генерации токена)

        $v = new Vk($config);

        // пример публикации сообщения на стене пользователя
        // значения массива соответствуют значениям в Api https://vk.com/dev/wall.post

        $response = $v->api('wall.post', array(
            'message' => 'I testing API form https://github.com/fdcore/vk.api'
        ));
    }

    public function setsocialAction()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        if ($name && $id)
        {
            $model = new OrderModel();
            $save = $model->setName($id, $name);
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
                    $values['image']  = "http://".$_SERVER['HTTP_HOST']."/".$image;
                }
            }

            $model = new OrderModel();
            $save = $model->addOrder($values['message'],$values['type'], $values['image']);
            if ($save)
            {
                $values['id'] = $save;
                if (!$values['image']) $values['image']  = "http://".$_SERVER['HTTP_HOST']."/"."application/templates/img/content/top-logo.png";
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