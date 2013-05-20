<?php

class CommonAction extends BasicAction {

    public function _initialize() {
        parent::_initialize();
        $topnav = D('Class')->getList(array('class_pid' => 0, 'class_group' => 'admin'));
        $this->assign('topnav', $topnav);
        self::left();
    }

    private function left() {
        $module = MODULE_NAME;
        $parent = D('Class')->getDetail(array('class_module' => $module, 'class_group' => 'admin'));
        $subnav = D('Class')->classToTree(array('class_id|class_pid' => $parent['class_id'], 'class_group' => 'admin'));
        $this->assign('subnav', current($subnav));
    }

}