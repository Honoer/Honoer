<?php

class BelleAction extends CommonAction {

    //系统环境信息
    public function index() {


        $this->display();
    }

    public function belle() {
	 

        $urls = array(
	    'http://pic.sogou.com/d?query=%CB%D1%B9%B7%C3%C0%C5%AE&mood=0&st=255&picformat=0&mode=255&di=0&p=40230500&dp=1&did=15',
            'http://pic.sogou.com/d?query=%CB%D1%B9%B7%C3%C0%C5%AE%B1%DA%D6%BD&mood=0&st=255&picformat=0&mode=255&di=0&st=255&p=40230500&dp=1&did=50#did49',
            'http://pic.sogou.com/d?query=%CB%D1%B9%B7%C3%C0%C5%AE%B1%DA%D6%BD&mood=0&st=255&picformat=0&mode=255&di=0&p=40230500&dp=1&did=123',
	    'http://pic.sogou.com/d?query=%B1%AC%C8%E9%C3%C0%C5%AE&mood=0&picformat=0&mode=1&di=2&p=40230500&dp=1&w=05009900&dr=1&_asf=pic.sogou.com&_ast=1371227443&did=4',
            'http://pic.sogou.com/d?query=%B1%AC%C8%E9%C3%C0%C5%AE&mood=0&picformat=0&mode=1&di=2&p=40230500&dp=1&w=05009900&dr=1&_asf=pic.sogou.com&_ast=1371227443&did=81',
        );
        $Belle = D('Belle');

        $result = $Belle->addImages($urls);
        $this->ajaxReturn($result, '操作成功！', 1);
    }

}
