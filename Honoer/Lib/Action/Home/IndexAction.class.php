<?php

class IndexAction extends BasicAction {

    public function index() {
        $this->display();
    }

    public function read() {
        $aid = $this->_get('aid');

        $data = D('Article')->getDetail($aid);
    }

}