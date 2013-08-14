<?php

class IndexAction extends CommonAction {

    public function index() {
        $Article = D('Article');
        C('PAGESIZE',10);
        $data = $Article->getList($where, $pages);
        $this->assign('data', $data);
        $this->display('Index:masonry');
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
        $Article = D('Article');
        C('PAGESIZE',10);
        $data = $Article->getList($where, $pages);
        $this->assign('data', $data);
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