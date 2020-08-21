<?php
namespace lib;
class smarty{
    function __construct()
    {
        //smarty配置
        $smarty = new \Smarty();
        global $config;
        $templateDir = isset($config["smarty"]["templateDir"])?$config["smarty"]["templateDir"]:TPL_PATH;
        $compileDir = isset($config["smarty"]["compileDir"])?$config["smarty"]["compileDir"]:COMPILE_PATH;
        $cacheDir = isset($config["smarty"]["cacheDir"])?$config["smarty"]["cacheDir"]:CACHE_PATH;
        $smarty->setTemplateDir($templateDir);
        $smarty->setCompileDir($compileDir);
        $smarty->setCacheDir($cacheDir);
        $this->smarty = $smarty;
    }
    function  assign($attr,$value){
            $this->smarty->assign($attr,$value);
    }
    function  display($file){
            $this->smarty->display($file);
    }
}