<?php

class CommonAction extends BasicAction {

    public function _initialize() {
        parent::_initialize();
        $topnav = D('Class')->getList(array('class_pid' => 0));
        $this->assign('topnav', $topnav);
        self::left();
    }

    private function left() {
        $module = MODULE_NAME;
        $subnav = D('Class')->classToTree(array('class_module' => $module));
        $this->assign('subnav', current($subnav));
    }

}