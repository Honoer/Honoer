<?php

class BasicAction extends Action {

    public function _empty($name) {
        $empty = new EmptyAction();
        $empty->index(ACTION_NAME);
        exit;
    }

    public function _initialize() {
        header("Content-Type:text/html; charset=utf-8");
        $_config = M('Config')->select();
        foreach ($_config as $value) {
            C($value['config_name'], $value['config_value']);
        }
    }

}

?>
