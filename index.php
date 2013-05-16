<?php

header('Content-Type:text/html;charset=utf-8');

//定义项目路径
define('THINK_PATH', './ThinkPHP3.0/');
define('UPLOAD_PATH', './Public/Upload/');
define('APP_NAME', 'Honoer');
define('APP_PATH', './Honoer/');
define('APP_DEBUG', true);

//加载并运行ThinkPHP
require( THINK_PATH . "ThinkPHP.php");
?>
