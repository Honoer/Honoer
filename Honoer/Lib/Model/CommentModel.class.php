<?php

class CommentModel extends Model {

    protected $fields = array('comment_id', 'article_id', 'comment_title', 'comment_content', 'create_time', 'create_ip', 'comment_email',
        '_pk' => 'comment_id', '_autoinc' => true);

    public function getList($where = null, &$pages = false) {
        empty($order) && $order = array('create_time' => 'DESC');
        return $this->field(true)
                        ->where($where)
                        ->order($order)
                        ->select();
    }

    public function getDetail($where) {
        if (is_numeric($where)) {
            $where = array('comment_id' => $where);
        }
        return $this->field(true)->where($where)->find();
    }

    public function addComment($args){
        $args['create_ip'] = get_client_ip();
        $args['create_time'] = timer();
        if($this->create($args)){
            if($this->add()){
                return true;
            }else{
                return $this->getError();
            }
        }
    }

}

?>
