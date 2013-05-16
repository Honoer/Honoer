<?php

class ArticleAction extends CommonAction {

    private $_model = null;

    public function __construct() {
        parent::__construct();
        $this->_model = D('Article');
    }

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
        $data = $this->_model->getList($where, $pages);
        $data = sub_content($data, 'article_content', 100);
        $dataClass = D("Article")->getClassByDate();
        $this->assign('data', $data);
        $this->assign('dataClass', $dataClass);
        $this->assign('page', $pages);
        //热门文章 根据点击次数去7条
        $hot = $this->_model->getSeven('top');
        $new = $this->_model->getSeven('new');
        $this->assign('hot', $hot);
        $this->assign('new', $new);
        $this->display();
    }

    public function read() {
        $aid = $_GET['aid'];
        $data = $this->_model->relation(true)->getDetail($aid);
        $prev = $this->_model->getDetail(array('article_id' => array('lt', $aid)), array('article_id' => 'DESC'));
        $next = $this->_model->getDetail(array('article_id' => array('gt', $aid)), array('article_id' => 'ASC'));
        $this->_model->where(array('article_id' => $aid))->setInc('article_view', 1);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        $this->assign('data', $data);
        //设置SEO信息
        $this->assign('seo', setseo(array($data['article_title'], $data['article_intro'], $data['article_keyword'])));
        $this->display();
    }

    public function search() {
        $keyword = $_GET['keyword'];
        $where = array(
            'article_title' => array('like', "%{$keyword}%"),
            'article_content' => array('like', "%{$keyword}%"),
            '_logic' => 'OR',
        );
        $data = $this->_model->getList($where, $pages);
        $this->assign('data', $data);
        $this->assign('page', $pages);
        $this->display('index');
    }

}