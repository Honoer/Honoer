<?php

class ClassModel extends RelationModel {

    protected $fields = array('class_id', 'class_name', 'class_pid', 'class_path', 'class_module', 'class_using', 'class_group',
        '_pk' => 'class_id', '_autoinc' => true);

    public function getList($where = null, &$pages = false) {
        $where['_logic'] = 'AND';
        $where['class_group'] = GROUP_NAME;
        if (false !== $pages) {
            import('@.ORG.Page');
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
            $where = array('class_id' => $where);
        }
        $where['_logic'] = 'AND';
        $where['class_group'] = GROUP_NAME;
        return $this->field(true)
                        ->where($where)
                        ->find();
    }

    public function classToTree($where, $isTree = true) {
        if (!empty($where)) {
            $parent = $this->getDetail($where);
            $map['class_pid|class_id'] = $parent['class_id'];
            $map['_logic'] = 'AND';
        }
        $map['class_group'] = GROUP_NAME;
        $class = $this->where($map)->select();
        return $isTree ? list_to_tree($class, 'class_id', 'class_pid') : $class;
    }

}

?>
