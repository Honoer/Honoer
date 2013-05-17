<?php

$name = $_GET['name'];
$data = returnRes($name);
exit($_GET['callback'] . '(' . json_encode($data) . ')');

//这里定义一个函数处理内容让callback调用
function returnRes($name) {
    if ($name === 'honoer.com') {
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        $str = '你已在' . $_SERVER["HTTP_HOST"] . '下登录成功！';
    } else {
        $str = '用户名错误！';
    }
    return $str;
}
?>