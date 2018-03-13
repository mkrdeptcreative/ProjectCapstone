<?php
namespace M6P\Models\util;

use mysqli;

class DBUtil
{
    public static function getConnection(){
        $config=Config::getConfig();
        $conn = new mysqli($config->mysqlServer, $config->mysqlUser, $config->mysqlPassword,$config->mysqlDB);
        return $conn;
    }
}

