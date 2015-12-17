<?php
if (!defined("USE_HOST"))// условие проверяющее возможность прямого доступа
    die("Прямой доступ запрещен!");// в случае прямого доступа вывод сообщения

class PhoneModel extends Model
{

    public function getPhones()
    {
        $sql = "SELECT * FROM `smartphones`";
        $result = $this->_pdo->prepare($sql);
        $result->execute();
        $phones = array_map('reset', $result->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC));

        $sql_params = "SELECT * FROM `smartphonesparameters` INNER JOIN parameters ON parameters.id =smartphonesparameters.IdParameter ";
        $result_params = $this->_pdo->prepare($sql_params);
        $result_params->execute();
        $phonesparameters = $result_params->fetchAll(PDO::FETCH_ASSOC);
        foreach ($phonesparameters as $param) {
            $idSmart = $param['IdSmartphone'];
            if (array_key_exists($idSmart,$phones))
            {
                $phones[$idSmart]['params'][] = $param;
            }
        }
      return $phones;
    }

}