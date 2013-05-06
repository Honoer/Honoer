<?php

class ClassModel extends RelationModel {

    protected $fields = array('class_id', 'class_name', 'class_pid', 'class_path', 'class_using', 'create_time', 'class_module',
        '_pk' => 'class_id', '_autoinc' => true);

    public function getList($where = null, $order = null, &$pages = false) {
        empty($order) && $order = array('create_time' => 'DESC');
        return $this->field(true)
                        ->where($where)
                        ->order($order)
                        ->select();
    }

    public function getDetail($where) {
        if (is_numeric($where)) {
            $where = array('class_id' => $where);
        }
        return $this->field(true)->where($where)->find();
    }

    public function classTree($where = null) {
        return list_to_tree($this->getList($where), 'class_id', 'class_pid');
    }

}

?>
