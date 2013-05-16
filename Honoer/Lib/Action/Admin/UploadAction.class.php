<?php

class UploadAction extends BasicAction {

    private $upload_path = null;
    private $upload_url = null;

    public function __construct() {
        parent::__construct();
        $this->upload_path = './Public/Upload/';
        $this->upload_url = '/Public/Upload/';
    }

    public function upload_json() {
        import("@.ORG.Util.Upload");
        $upload = new Upload($this->upload_path, $this->upload_url);
        return $upload->upload_json();
    }

    public function file_manager_json() {
        import("@.ORG.Util.Upload");
        $upload = new Upload($this->upload_path, $this->upload_url);
        return $upload->file_manager_json();
    }

    public function uploadFiles() {
        import('@.ORG.Util.UploadFile');
        import('@.ORG.Util.Image');
        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = $this->upload_path; // 设置附件上传目录
        $upload->thumb = true;
        $upload->thumbMaxWidth = '140';
        $upload->thumbMaxHeight = '98';
        if (!$upload->upload()) {// 上传错误提示错误信息
            //return $upload->getErrorMsg();
            return false;
        } else {
            // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
        }
        return current($info);
    }

}

?>
