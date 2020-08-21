<?php
use lib\database;
use lib\smarty;
class reg
{
    function add()
    {
        $smarty = new smarty();
        $smarty->display("admin/reg.html");
    }
    function addUser()
    {
        $uname = $_POST["uname"];
        echo $uname;
        echo "<br>";
        $pass = $_POST["pass"];
        echo $pass;
        echo "<br>";
        $pass1 = $_POST["pass1"];
        echo $pass1;
        if($pass!==$pass1){
            echo "密码不一致!";
            return;
        }
        //$db = new mysqli("localhost","root","","exp","3308");
        //if (mysqli_connect_error()) {
            //die("连接数据库错误！");
        //}
        //$db->query("set names utf8");
        $database = new database();
        $db = $database->db;
        $result  = $db->query("select uname from user where uname='{$uname}'");
        if($result->num_rows>0){
            echo "用户名密码错误";
        }else {
            $passre = md5(md5($pass));
            $db->query("insert into user (uname,pass) VALUES ('$uname','$passre')");
            echo "insert into user (uname,pass) VALUES ('$uname','$passre')";
            echo "注册成功!";
        }
    }
    function checkName(){
        $uname = $_POST["uname"];
        $db = new mysqli("localhost","root","","exp","3308");
        if (mysqli_connect_error()) {
            die("连接数据库错误！");
        }
        $db->query("set names utf8");
        $result  = $db->query("select uname from user where uname='{$uname}'");
        if($result->num_rows==0){
            echo "true";
        }else{
            echo "false";
        }
    }
}
