<?php

class IndexAction extends CommonAction {

    public function index() {
        $this->display();
    }

    public function read() {
        $aid = $this->_get('aid');

        $data = D('Article')->getDetail($aid);
    }

}