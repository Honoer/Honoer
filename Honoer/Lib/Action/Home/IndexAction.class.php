<?php

class IndexAction extends CommonAction {

    public function index() {
        $Belle = D('Belle');
        C('PAGESIZE', 10);
        $data = $Belle->getList($where, $pages);
        $this->assign('data', $data);
        //$this->assign('page', $pages);
        $this->display();
    }

    public function read() {
        $page = $_GET['page'];

        $Belle = D('Belle');
        $Belle->page("$page,10");
        $data = $Belle->getList($where);
        $this->assign('data', $data);
        $this->assign('page', $page);
        $this->display('Index:index');
    }

    public function masonry() {
        for ($i = 0; $i < 10; $i++) {
            $res[$i] = rand(100, 400);
        }
        $this->assign('height', $res);
        $this->display();
    }

    //获取一次请求的数据
    public function more() {
        for ($i = 0; $i < 6; $i++) {
            $res[$i] = rand(100, 400);
        }
        $this->ajaxReturn($res);
    }

}