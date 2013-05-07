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
            'mapping_name' => '_user',
            'class_name' => '_user',
            'foreign_key' => 'user_id',
            'as_fields' => 'user_nickname',
        ),
    );

    public function getList($where = null, &$pages = false) {
        if (false !== $pages) {
            import('@.ORG.Util.Page');
            $count = $this->where($where)->count();
            $Page = new Page($count, C('PAGESIZE'));
            $pages = $Page->show();
            $this->limit($Page->firstRow . ',' . $Page->listRows);
        }
        return $this->field(true)
                        ->where($where)
                        ->select();
    }

    function getDetail($where) {
        is_numeric($where) && $where = array('article_id' => $where);
        return $this->field(true)
                        ->where($where)
                        ->find();
    }

    public function getSeven($num) {
        $this->order(array('article_view' => 'DESC'));
        $this->limit($num);
        return $this->getList();
    }

}

?>
