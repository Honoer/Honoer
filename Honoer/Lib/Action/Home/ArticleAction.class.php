<?php

class ArticleAction extends CommonAction {

    public function index() {
        $cid = $_GET['cid'];
        $keyword = $_GET['keyword'];
        $date = $_GET['date'];
        if (isset($keyword) && !empty($keyword)) {
            $where = array(
                'article_title' => array('like', "%{$keyword}%"),
                'article_content' => array('like', "%{$keyword}%"),
                '_logic' => 'OR',
            );
        }
        if (isset($date) && !empty($date)) {
            $where = array('create_time' => array('like', "%{$date}%"));
        }
        !empty($cid) && $where = array('class_id' => $cid);
        $data = D('Article')->getList($where, $pages);
        $data = sub_content($data, 'article_content', 100);
        $dataClass = D("Article")->getClassByDate();
        $this->assign('data', $data);
        $this->assign('dataClass', $dataClass);
        $this->assign('page', $pages);
        //热门文章 根据点击次数去7条
        $hot = D('Article')->getSeven('top');
        $new = D('Article')->getSeven('new');
        $this->assign('hot', $hot);
        $this->assign('new', $new);
        $this->display();
    }

    public function read() {
        $aid = $_GET['aid'];
        $data = D('Article')->relation(true)->getDetail($aid);
        $prev = D('Article')->getDetail(array('article_id' => array('lt', $aid)), array('article_id' => 'DESC'));
        $next = D('Article')->getDetail(array('article_id' => array('gt', $aid)), array('article_id' => 'ASC'));
        D("Article")->where(array('article_id' => $aid))->setInc('article_view', 1);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('data', $data);
        //设置SEO信息
        $this->assign('seo', setseo(array($data['article_title'], $data['article_description'], $data['article_keyword'])));
        $this->display();
    }
    
    public function search() {
        $keyword = $_GET['keyword'];
        $where = array(
            'article_title' => array('like', "%{$keyword}%"),
            'article_content' => array('like', "%{$keyword}%"),
            '_logic' => 'OR',
        );
        $data = D('Article')->getList($where, $pages);
        $this->assign('data', $data);
        $this->assign('page', $pages);
        $this->display('index');
    }

}