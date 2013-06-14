<?php

class BelleAction extends CommonAction {

    //系统环境信息
    public function index() {


        $this->display();
    }

    public function belle() {

        $urls = array(
            'http://pic.sogou.com/d?query=%C3%C0%C5%AE&mood=0&picformat=0&mode=1&di=2&p=50040513&dp=1&w=05009900&dr=1&did=69',
            'http://pic.sogou.com/d?query=%C3%C0%C5%AE&mood=0&picformat=0&mode=1&di=2&p=50040513&dp=1&w=05009900&dr=1&did=151',
        );
        $Belle = D('Belle');

        $result = $Belle->addImages($urls);
        $this->ajaxReturn(null, '操作成功！', 1);
    }

}