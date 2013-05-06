<?php

class CommonAction extends BasicAction {

    public function _initialize() {
        parent::_initialize();
        self::header();
        self::footer();
    }

    public function header() {
        $topnav = D('Class')->classTree();
        $this->assign('topnav', $topnav);
    }

    public function footer() {
        
    }

}