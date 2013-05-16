<?php

//项目配置文件
$db_config = require 'db.config.php';
$app_config = array(
    'URL_MODEL'=>2,
    'OUTPUT_ENCODE' => false, //页面压缩
    'APP_FILE_CASE' => true, //检查大小写
    'APP_GROUP_LIST' => 'Home,Admin', //分组名称
    'DEFAULT_GROUP' => 'Home', //默认分组
    'DEFAULT_THEME' => 'Default', //默认模版
    'LAYOUT_ON' => true, //开启layout
    'VAR_PAGE' => 'p',
    'TMPL_FILE_DEPR' => '-', //模版分割符
);

return array_merge($db_config, $app_config);
?>
