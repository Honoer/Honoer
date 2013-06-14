<?php

class IndexAction extends CommonAction {

    //系统环境信息
    public function index() {


        $this->display();
    }

    public function belle() {

        $urls = array(
            'http://pic.sogou.com/d?query=%C3%C0%C5%AE&mood=0&md5group=F755CA727BC344FC98E6306D3F1BD9F2&did=1&p=99530502#did8_0',
        );
        $Belle = D('Belle');

        $result = $Belle->addImages($urls);
        $this->ajaxReturn(null, '操作成功！', 1);
    }

}