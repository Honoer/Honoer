<?php

//数据库配置文件
return array(
    // +----------------------------------------------------------------------
    // | 数据库配置
    // +----------------------------------------------------------------------
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'h.me',
    'DB_USER' => 'root',
    'DB_PWD' => '',
//    'DB_NAME' => 'mfzemgrh3e_bolg', 
//    'DB_USER' => 'mfzemgrh3e_root', 
//    'DB_PWD' => 'D1dLWGXh',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'tp_',
    // +----------------------------------------------------------------------
    // | 项目配置
    // +----------------------------------------------------------------------
    'OUTPUT_ENCODE' => false, //页面压缩
    'APP_FILE_CASE' => true, //检查大小写
    'APP_GROUP_LIST' => 'Home,Admin', //分组名称
    'DEFAULT_GROUP' => 'Home', //默认分组
    'DEFAULT_THEME' => 'Default', //默认模版
    'DEFAULT_MODULE' => 'Article',
    'LAYOUT_ON' => true, //开启layout
    'VAR_PAGE' => 'p',
    'TMPL_FILE_DEPR' => '-', //模版分割符
    'URL_MODEL' => 2,
    // +----------------------------------------------------------------------
    // | 网站配置
    // +----------------------------------------------------------------------
    'WEB_NAME' => '『Honoer.com』Web技术',
    'WEB_LOGO' => '',
    'WEB_RECODE' => 'copyright ©2012 All Rights Reserved.',
    'WEB_ICP' => '粤ICP备88888888号-1',
    'WEB_STATISTIC' => '<script type="text/javascript">
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?45b34fa03392243e4038fd601390f9dc";
            var s = document.getElementsByTagName("script")[0]; 
            s.parentNode.insertBefore(hm, s);
        })();
    </script>',
);
?>
