<?php

class ArticleAction extends BasicAction {

    public function index() {
        $data = D('Article')->relation(true)->getList($where,$order);
        $data = sub_content($data, 'article_content');
        $this->assign('data', $data);
        //热门文章 根据点击次数去7条
        $hot = D('Article')->getList(null,array('article_view'=>'DESC'),7);
        $this->assign('hot', $hot);
        $this->display();
    }

    public function read() {
        $aid = $this->_get('aid');
        $data = D('Article')->relation(true)->getDetail($aid);
        $prev = D('Article')->getDetail(array('article_id' => array('lt', $aid)));
        $next = D('Article')->getDetail(array('article_id' => array('gt', $aid)));
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('data', $data);
        $this->display();
    }

}