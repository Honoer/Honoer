<?php

class IndexAction extends CommonAction {

    public function index() {
        $this->display();
    }

    public function read() {
        $aid = $this->_get('aid');
        $data = D('Article')->getDetail($aid);
    }

    //系统环境信息
    public function main() {
        $server_info = array(
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '最大上传限制' => ini_get('upload_max_filesize'),
            '最大执行时间' => ini_get('max_execution_time') . '秒',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '服务器域名/IP' => $_SERVER['SERVER_NAME'] . ' [' . gethostbyname($_SERVER['SERVER_NAME']) . ']',
            '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
        );
        $this->assign('server_info', $server_info);
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