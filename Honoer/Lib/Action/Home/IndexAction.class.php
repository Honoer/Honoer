<?php

class IndexAction extends CommonAction {

    public function index() {
        dump($_SESSION);
        $this->display();
    }

    public function read($aid) {
        //$aid = $this->_get('aid');

        $_SESSION = array();
        if ($aid === '888') {
            $_SESSION['name'] = $aid;
            $_SESSION['time'] = date('Y-m-d H:i:s', time());
            return $_SESSION;
        } else {
            $data = D('Article')->getDetail($aid);
            return $data['article_title'];
        }
    }

    public function see() {

        dump($_SESSION);
    }

    public function jsonpdata() {
        $aid = $_GET['code'];
        $data = $this->read($aid);
        echo $_GET['callback'] . '(' . json_encode($data) . ')';
    }

}