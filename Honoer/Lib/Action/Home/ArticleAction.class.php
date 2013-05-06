<?php

class ArticleAction extends CommonAction {

    public function index() {
        $cid = $_GET['cid'];
        !empty($cid) && $where['class_id'] = $cid;
        $order = array();
        $data = D('Article')->relation(true)->getList($where, $pages);
        $data = sub_content($data, 'article_content');
        $this->assign('data', $data);
        //热门文章 根据点击次数去7条
        $hot = D('Article')->getTopSeven(7);
        $this->assign('hot', $hot);
        $this->assign('page', $pages);
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
    
    public function reply(){
        $data = $_POST;
        $data['article_id'] = $_GET['aid'];
        $result =D('Comment')->addComment($data);
        dump($result);
    }

}