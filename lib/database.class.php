<?php
namespace lib;
// 你定义了命名空间，调用的类认为是该命名空间下的类，所以需要加个反斜杠是全局的类new \mysqli
class database{
    function __construct()
    {
        global $config;
        $host=isset($config["database"]["host"])?$config["database"]["host"]:"localhost";
        $username=isset($config["database"]["username"])?$config["database"]["username"]:"root";
        $password=isset($config["database"]["password"])?$config["database"]["password"]:"";
        $dbname=isset($config["database"]["dbname"])?$config["database"]["dbname"]:"exp";
        $port=isset($config["database"]["port"])?$config["database"]["port"]:"3308";
        $db = new \mysqli($host,$username,$password,$dbname,$port);
        if(mysqli_connect_error()){
            die("数据库连接失败！");
        }
        $db->query("set names utf8");
        $this->db = $db;
    }
}