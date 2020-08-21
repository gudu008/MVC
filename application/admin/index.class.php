<?php
if (!defined("MVC")) {
    die("非法入侵");
}
use lib\smarty;
use lib\database;
class index
{
    function int()
    {
        $smarty = new Smarty();
        //$smarty->setTemplateDir(TPL_PATH);
        //$smarty->setCompileDir(COMPILE_PATH);
        //$smarty->setCacheDir(CACHE_PATH);
        $smarty->display("admin/admin.html");
    }
    function login()
    {
        $uname = addslashes($_POST["uname"]);//对SQL语句进行转义
        $pass = md5(md5($_POST["pass"]));
        if(strlen($uname)<5||empty($pass)){
            echo "用户名和密码不符合规范!";
            return;
        }
        //用户表存储用户的主要信息 //如果需要更多的信息 则创建一个新的副表
        //$db = new mysqli("localhost","root","","exp","3308");
        //if (mysqli_connect_error()) {
            //die("连接数据库错误！");
        //}
        //$db->query("set names utf8");
        $database = new database() ;
        $db = $database->db;
        $result = $db->query("select * from user where uname='$uname' and pass='$pass'");
       if($result->num_rows<1){
           echo "没有相应的数据,请重新登录";
       }else{
           header("location:".ENTRY_ADD."/admin/index/first");
       }
    }
    function first(){
        echo "后台首页";
    }
}
