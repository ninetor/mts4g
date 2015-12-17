<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class AdminController extends Controller
{
    public $_errorAction = "errorAction";
    public $_defaultAction = "adminAction";
    private $hashPass = "125bc3acc301e660152083e21835193b";
    private $hashLogin = "0b7bf3a6e704d3f71a4a95aace5b4dfd";

    public function errorAction()
    {
        var_dump("Sorry. Error.");
    }

    public function adminAction()
    {
        if ($this->checkLogin()) {
            header("Location: /admin/orders");
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    function generateCode($length = 6)
    {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0, $clen)];
        }

        return $code;

    }

    private function checkLogin()
    {
        session_start();
        if (isset($_SESSION['hash'])) {

            $hashSession = $_SESSION['hash'];
            $hashCookie = $_COOKIE['hash'];
            if ($hashCookie === $hashSession) {
                return true;
            }
        }

        return false;
    }
    public function loginAction()
    {
        if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
            $loginHash = md5(md5($_POST['login']));
            $passHash = md5(md5($_POST['password']));
            if ($loginHash === $this->hashLogin && $passHash === $this->hashPass) {
                session_start();
                $hash = md5(md5($this->generateCode(10)));
                setcookie("hash", $hash);
                $_SESSION['hash'] = $hash;
                header('Location: /admin/orders');
                die;
            }
        }
        $view = new AdminView();
        return $this->_controller->setPage($view->showLogin());
    }

    public function ordersAction()
    {
        if ($this->checkLogin()) {
            $model = new OrderModel();
            $find_text = null;
            if (isset($_GET['find_text']) && $find_text = $_GET['find_text']){
                $addQueryWhere = "where `order`.text like '%{$find_text}%'";
                $orders = $model->getOrders($addQueryWhere);
                $pagination = "";
            }
            else
            {
                $Allorders = $model->getOrders();
                $countAll = count($Allorders);
                $limit = 5;
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $pagination = pagination($countAll,$currentPage,$limit, "/admin/orders");
                $offset = $limit * ($currentPage -1);
                $addQuery = " LIMIT $limit OFFSET $offset";
                $orders = $model->getOrders("",$addQuery);
            }

            $winners = $model->getWinnersIds();
            $view = new AdminView();
            return $this->_controller->setPage($view->showOrders(['orders'=>$orders, 'pagination' => $pagination,'find_text'=>$find_text,'winners'=>$winners ],'orders'));
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    public function removeorderAction()
    {
        if ($this->checkLogin()) {

            $id = $_GET['id'];
            if ($id)
            {
                $model = new OrderModel();
                $orderemove = $model->removeOrder($id);
            }
            header("Location: /admin/orders");
            die;
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    public function removeweekAction()
    {
        if ($this->checkLogin()) {

            $id = $_GET['id'];
            if ($id)
            {
                $model = new OrderModel();
                $orderRemove = $model->removeWeek($id);
            }
            header("Location: /admin/weeks");
            die;
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    public function weeksAction()
    {
        if ($this->checkLogin()) {
            $model = new OrderModel();

            if (isset($_POST['weekadd']) && $weekadd = $_POST['weekadd']){
                $model->addWeeks($weekadd);
                header("Location: /admin/weeks");
                die;
            }

            $weeks = $model->getWeeks();

            $view = new AdminView();
            return $this->_controller->setPage($view->showWeeks(['weeks'=>$weeks ],'weeks'));
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    public function weeksviewAction()
    {
        if ($this->checkLogin()) {
            $model = new OrderModel();
            if (isset($_GET['id']) && $id = $_GET['id']){
            $week = $model->getWinnersWeekId($id);

            $view = new AdminView();
            return $this->_controller->setPage($view->showWeek(['week'=>$week ],'weeks'));
            }
        } else {
            header('Location: /admin/login');
            die;
        }
    }

    public function winnersetAction()
    {
        if ($this->checkLogin()) {
            $model = new OrderModel();
            var_dump(isset($_POST['id']) && ($id = $_POST['id']) && isset($_POST['enable']));
            if (isset($_POST['id']) && ($id = $_POST['id']) && isset($_POST['enable'])){

                $week = $model->setWinner($id,$_POST['enable']);
                echo json_encode($week);
            }
        } else {
            die;
        }
    }

}