<?php

namespace App\models;
require_once 'env.php';
use PDO;
class DB
{
    function getConnect()
    {
        $connect = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=" . DBCHARSET, DBUSER, DBPASS);
        return $connect;
    }

    function getData($query, $getAll = true)
    {
        $conn = $this->getConnect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        if ($getAll) {
            return $stmt->fetchAll();
        } else {
            return $stmt->fetch();
        }
    }
}
?>
