<?php

class ArticleAction extends CommonAction {

    public function index() {
        $data = D('Article')->getList(null, $pages);
        $data = sub_content($data, 'article_content', 120);
        $this->assign('data', $data);
        $this->assign('page', $pages);
        //热门文章 根据点击次数�?�?
        $hot = D('Article')->getSeven('top');
        $new = D('Article')->getSeven('new');
        $this->assign('hot', $hot);
        $this->assign('new', $new);
        $this->display();
    }

    public function read() {
        $aid = $this->_get('aid');
        $data = D('Article')->relation(true)->getDetail($aid);
        $prev = D('Article')->getDetail(array('article_id' => array('lt', $aid)), array('article_id' => 'DESC'));
        $next = D('Article')->getDetail(array('article_id' => array('gt', $aid)), array('article_id' => 'ASC'));
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('data', $data);
        $this->display();
    }

    public function edit() {
        if (!empty($_POST)) {
            if (D('Article')->saveArticel($_POST)) {
                $this->ajaxReturn(null, '操作成功！', 1);
            } else {
                $this->ajaxReturn(null, '操作失败！', 0);
            }
        } else {
            $aid = $this->_get('aid');
            $data = D('Article')->relation(true)->getDetail($aid);
            $class = D('Class')->getList(array('class_pid'=>5));
            $this->assign('data', $data);
            $this->assign('class', $class);
            $this->display();
        }
    }

}