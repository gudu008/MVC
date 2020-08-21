<?php
class main {
    function __construct()
    {
        //smarty配置
        $smarty = new Smarty();
        global $config;
        $templateDir = isset($config["smarty"]["templateDir"])?$config["smarty"]["templateDir"]:TPL_PATH;
        $compileDir = isset($config["smarty"]["compileDir"])?$config["smarty"]["compileDir"]:COMPILE_PATH;
        $cacheDir = isset($config["smarty"]["cacheDir"])?$config["smarty"]["cacheDir"]:CACHE_PATH;
        $smarty->setTemplateDir($templateDir);
        $smarty->setCompileDir($compileDir);
        $smarty->setCacheDir($cacheDir);
        $this->smarty = $smarty;
        //数据库配置
        $host=isset($config["database"]["host"])?$config["database"]["host"]:"localhost";
        $username=isset($config["database"]["username"])?$config["database"]["username"]:"root";
        $password=isset($config["database"]["password"])?$config["database"]["password"]:"";
        $dbname=isset($config["database"]["dbname"])?$config["database"]["dbname"]:"exp";
        $port=isset($config["database"]["port"])?$config["database"]["port"]:"3308";
        $db = new mysqli($host,$username,$password,$dbname,$port);
        if(mysqli_connect_error()){
            die("数据库连接失败！");
        }
        $db->query("set names utf8");
        $this->db = $db;
    }

}