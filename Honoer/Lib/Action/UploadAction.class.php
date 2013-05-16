<?php

class UploadAction extends BasicAction {

    public function upload_json() {
        import("@.ORG.Util.Upload");
        $upload = new Upload();
        $upload->save_path = './Public/Uploads/';
        $upload->save_url = './Public/Uploads/';
        return $upload->upload_json();
    }

    public function file_manager_json() {
        import("@.ORG.Util.Upload");
        $upload = new Upload();
        $upload->save_path = './Public/Uploads/';
        $upload->save_url = './Public/Uploads/';
        return $upload->file_manager_json();
    }

    public function uploadFiles() {
        import('@.ORG.Util.UploadFile');
        $upload = new UploadFile(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = './Public/Images/'; // 设置附件上传目录
        if (!$upload->upload()) {// 上传错误提示错误信息
            return $upload->getErrorMsg();
        } else {
            // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
        }
        return current($info);
    }

}

?>
