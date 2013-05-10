<?php
$code = $_GET['code'];


$data = returnData($code);

exit($_GET['callback'].'('.json_encode($data).')'); 

//echo json_encode(call());




function returnData($code){
	$data = $_SERVER;
	$str = "你请求的地址是：".__FILE__.";CODE:".$code;
	$_SESSION=array();
	if($code ==='888'){
		$_SESSION['name'] = $code;
		$_SESSION['time'] = time();
		$str = '你已在'.$data["HTTP_HOST"].'下登录成功！';
	}
	return $str;

}
?>