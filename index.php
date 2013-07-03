<?php

header('Content-Type:text/html;charset=utf-8');

switch ($_SERVER['HTTP_HOST']) {
    case 'honoer.com':
        header("Location: http://www.honoer.com", TRUE, 301);
        break;
    case 'shop.honoer.com':
        header("Location: http://jody410.taobao.com", TRUE, 301);
        break;
    default :
        break;
}
//定义项目路径
define('THINK_PATH', './ThinkPHP3.0/');
define('APP_NAME', 'Honoer');
define('APP_PATH', './Honoer/');
define('APP_DEBUG', false);
define('UPLOAD_PATH', 'Public/Upload/'); //路径前面不能加./
define('HTML_PATH', './Public/Html/');

//加载并运行ThinkPHP
require( THINK_PATH . "ThinkPHP.php");
?>
