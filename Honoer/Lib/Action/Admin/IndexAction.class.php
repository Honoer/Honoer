<?php

class IndexAction extends CommonAction {

    //系统环境信息
    public function index() {

        if (function_exists('gd_info')) {
            $gd = gd_info();
            $gd_version = $gd['GD Version'];
        } else {
            $gd_version = "不支持";
        }
        $webinfo = array(
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '最大上传限制' => ini_get('upload_max_filesize'),
            '最大执行时间' => ini_get('max_execution_time') . '秒',
            '服务器域名/IP' => $_SERVER['SERVER_NAME'] . ' [' . gethostbyname($_SERVER['SERVER_NAME']) . ']',
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            '操作系统' => PHP_OS,
            '主机名IP端口' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '程序目录' => SITE_PATH,
            'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : '不支持',
            'GD库版本' => $gd_version,
            'MYSQL版本' => mysql_get_server_info(),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '采集函数检测' => ini_get('allow_url_fopen') ? '支持' : '不支持',
            'register_globals' => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
            'magic_quotes_gpc' => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
            'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
        );
        $this->assign('webinfo', $webinfo);
        $this->display();
    }

    //更新缓存
    public function updateCache() {
        import("@.ORG.Dir");
        $dir = new Dir;
        @unlink(RUNTIME_PATH . '~runtime.php');
        if (is_dir(RUNTIME_PATH . 'Cache')) {
            $dir->delDir(RUNTIME_PATH . 'Cache');
        }
        if (is_dir(RUNTIME_PATH . 'Data')) {
            $dir->delDir(RUNTIME_PATH . 'Data');
        }
        if (is_dir(RUNTIME_PATH . 'Logs')) {
            $dir->delDir(RUNTIME_PATH . 'Logs');
        }
        if (is_dir(RUNTIME_PATH . 'Temp')) {
            $dir->delDir(RUNTIME_PATH . 'Temp');
        }
        $this->ajaxReturn('清除成功');
    }

}