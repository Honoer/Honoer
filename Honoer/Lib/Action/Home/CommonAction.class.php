<?php

class CommonAction extends BasicAction {

    public function _initialize() {
        parent::_initialize();

        $topnav = D('Class')->parsePath();
        $this->assign('topnav', $topnav);
    }

}