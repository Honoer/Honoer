<?php

class CommonAction extends BasicAction {

    public function _initialize() {
        parent::_initialize();
        $topnav = D('Class')->classToTree();
        $this->assign('topnav', $topnav);
    }

}