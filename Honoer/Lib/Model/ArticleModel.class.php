<?php

class ArticleModel extends RelationModel {

    protected $fields = array('article_id', 'class_id', 'article_title', 'article_content', 'user_id', 'create_time', 'article_view', 'article_comment',
        '_pk' => 'article_id', '_autoinc' => true);
    protected $_link = array(
        'Comment' => array(
            'mapping_type' => HAS_MANY,
            'mapping_name' => '_comment',
            'class_name' => '_comment',
            'foreign_key' => 'article_id',
            'mapping_order' => 'create_time DESC',
        ),
        'User' => array(
            'mapping_type' => BELONGS_TO,
            'mapping_name' => 'User',
            'class_name' => 'User',
            'foreign_key' => 'user_id',
            'as_fields' => 'user_nickname',
        ),
    );

    public function getList($where, &$pages = false) {
        $order = array('create_time' => 'DESC');
        if (false !== $pages) {
            $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
            $this->page($p . ',5');
        }
        $data = $this->field(true)
                ->where($where)
                ->order($order)
                ->select();

        if (false !== $pages) {
            import('@.ORG.Util.Page');
            $count = $this->where($where)->count();
            $Page = new Page($count, 5);
            $pages = $Page->show();
        }
        return $data;
    }

    public function getDetail($where) {
        if (is_numeric($where)) {
            $where = array('article_id' => $where);
        }
        return $this->field(true)->where($where)->find();
    }

    public function getTopSeven($num) {
        $order = array('article_view' => 'DESC');
        $this->order($order);
        $this->limit($num);
        return $this->getList($where);
    }

}

?>
