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
        $p = $_GET['p'];
        for ($i = 0; $i < 10; $i++) {
            $res[][$i] = rand(100, 400);
            $res[]['title'] ='萨达速度达大厦'.$i;
            $res[]['name'] ='使用介绍/全套快捷键及插件推荐'.$i;
        }
        $this->assign('data', $res);
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