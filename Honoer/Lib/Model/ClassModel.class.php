<?php

class ClassModel extends RelationModel {

    protected $fields = array('class_id', 'class_name', 'class_pid', 'class_path', 'class_module', 'class_using',
        '_pk' => 'class_id', '_autoinc' => true);

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

    public function getDetail($where) {
        if (is_numeric($where)) {
            $where = array('class__id' => $where);
        }
        return $this->field(true)
                        ->where($where)
                        ->find();
    }

    public function classToTree($where = null, $isTree = true) {
        $class = $this->getList($where);
        return $isTree ? list_to_tree($class, 'class_id', 'class_pid') : $class;
    }

}

?>
