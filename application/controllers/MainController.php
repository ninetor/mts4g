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
        $modelOrder = new OrderModel();
        $model = new PhoneModel();
        $phones =$model->getPhones();

        return $this->_controller->setPage($view->showMain(['count'=>$modelOrder->getCount(), 'phones' => $phones]));
    }

    public function specificationAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showSpecification());
    }

    public function sharesAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showShares());
    }
    public function testAction()
    {
        $view = new MainView();
        return $this->_controller->setPage($view->showTest([]));
    }

    public function uploadimageAction()
    {


        $imagePath = "{$_SERVER['DOCUMENT_ROOT']}/uploads/";

        $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);

        //Check write Access to Directory

        if(!is_writable($imagePath)){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t upload File; no write Access'
            );
            print json_encode($response);
            return;
        }

        if ( in_array($extension, $allowedExts))
        {
            if ($_FILES["img"]["error"] > 0)
            {
                $response = array(
                    "status" => 'error',
                    "message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
                );
            }
            else
            {

                $filename = $_FILES["img"]["tmp_name"];
                list($width, $height) = getimagesize( $filename );

                move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

                $imagePath = 'uploads/';
                $response = array(
                    "status" => 'success',
                    "url" => $imagePath.$_FILES["img"]["name"],
                    "width" => $width,
                    "height" => $height
                );

            }
        }
        else
        {
            $response = array(
                "status" => 'error',
                "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
            );
        }

        print json_encode($response);

    }
    public function cropimageAction()
    {
        /*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/
        $imgUrl = "http://".$_SERVER['HTTP_HOST']."/".$_POST['imgUrl'];
// original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
// resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
// offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
// crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
// rotation angle
        $angle = $_POST['rotation'];

        $jpeg_quality = 100;

        $output_filename = "uploads/croppedImg_".rand();


// uncomment line below to save the cropped image in the same location as the original image.
//$output_filename = dirname($imgUrl). "/croppedImg_".rand();

        $what = getimagesize($imgUrl);
        switch(strtolower($what['mime']))
        {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
                $source_image = imagecreatefrompng($imgUrl);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
                $source_image = imagecreatefromgif($imgUrl);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }


//Check write Access to Directory

        if(!is_writable(dirname($output_filename))){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );
        }else{

            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $output_filename.$type, $png_quality);
            imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => $output_filename.$type
            );
        }
        print json_encode($response);
    }

    public function membersAction()
    {

        $model = new OrderModel();
        $winnersWeek= $model->getWinnersWeek();
        $Allmembers = $model->getMembers();
        $countAll = count($Allmembers);
        $limit = 10;

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $currentId = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $pagination = pagination($countAll,$currentPage,$limit);

        $offset = $limit* ($currentPage -1);
        $addQuery = " LIMIT $limit OFFSET $offset";
        if ($currentPage==1 && $currentId) {$addQuery = "order by id = $currentId desc, id desc ".$addQuery;}
        $members = $model->getMembers($addQuery);
        $view = new MainView();

        return $this->_controller->setPage($view->showMembers(['members'=>$members, 'pagination' => $pagination,'id'=>$currentId,'winnersWeek'=>$winnersWeek]));
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


//    public function testAction()
//    {
//
//        $v = new Vkclass(array(
//            'client_id' => 5189016, // (обязательно) номер приложения
//            'secret_key' => 'nRE4ql1ddmIsGtOxOolj', // (обязательно) получить тут https://vk.com/editapp?id=12345&section=options где 12345 - client_id
//            'scope' => 'wall', // права доступа
//            'v' => '5.35' // не обязательно
//        ));
//
//        $response = $v->wall->post(array(
//            'message' => 'I testing API form https://github.com/fdcore/vk.api'
//        ));
//            var_dump($response);die;
////        $url = $v->get_code_token();
////        var_dump($url);
//        die;
//        $config['secret_key'] = 'nRE4ql1ddmIsGtOxOolj';
//        $config['client_id'] = 5189016; // номер приложения
//        $config['access_token'] = 'ваш токен доступа';
//        $config['scope'] = 'wall,photos,video'; // права доступа к методам (для генерации токена)
//
//        $v = new Vk($config);
//
//        // пример публикации сообщения на стене пользователя
//        // значения массива соответствуют значениям в Api https://vk.com/dev/wall.post
//
//        $response = $v->api('wall.post', array(
//            'message' => 'I testing API form https://github.com/fdcore/vk.api'
//        ));
//    }


    public function createorderAction()
    {
        $values = $_POST;
        if (!array_key_exists('image',$values))
        {
            $values['image'] = null;
        }
        if ($values['message'] && $values['type'] && $values['social'])
        {
            if ($values['image'])
            {
//                $name = str_replace("uploads/",'',$values['image']);
                $values['image'] = "http://" . $_SERVER['HTTP_HOST'] . "/" . $values['image'];
            }


            $model = new OrderModel();
            $save = $model->addOrder($values['message'],$values['type'],$values['social'], $values['image']);
            if ($save)
            {
                $values['id'] = $save;
                if (!$values['image']) $values['image']  = "http://".$_SERVER['HTTP_HOST']."/"."application/templates/img/content/stylemap.png";
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