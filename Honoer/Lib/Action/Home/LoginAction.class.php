<?php

class LoginAction extends CommonAction {

    private $client_id;
    private $redirect_uri;
    private $scope;
    private $client_secret;

    public function __construct() {
        parent::__construct();
        $this->client_id = C('QQ_APPID');
        $this->redirect_uri = C('WEB_URL') . C('QQ_CALLBACK');
        $this->client_secret = C('QQ_KEY');
        $this->scope = C('QQ_SCOPE');
    }

    public function oauth() {
        echo __METHOD__;
    }

    public function qq_login() {
        $state = md5(date("YmdHis" . get_client_ip()));
        $login_url = "https://graph.qq.com/oauth2.0/authorize?";
        $qqArray = array(
            'response_type' => 'code',
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'scope' => $this->scope,
            'state' => $state,
        );
        foreach ($qqArray as $key => $val) {
            $qqParam[] = $key . '=' . urlencode($val);
        }
        $login_url .=join('&', $qqParam);
        Header("Location:$login_url");
    }

    public function qq_callback() {
        $token_url = "https://graph.qq.com/oauth2.0/token?";
        $GetParam = array(
            'grant_type' => 'authorization_code',
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'client_secret' => $this->client_secret,
            'scope' => $this->scope,
            'code' => $_GET["code"],
            'state' => $_GET["state"],
        );
        foreach ($GetParam as $key => $val) {
            $QQarray[] = $key . '=' . $val;
        }
        $token_url.=join('&', $QQarray);
        $response = get_url_contents($token_url);

        //if (strpos($response, "callback") !== false){
        //
			//}		这一步不知道是什么情况
        $params = array();
        parse_str($response, $params);
        //获取到用户登录状态 保存到SESSION
        $_SESSION['access_token'] = $params['access_token'];
        $this->get_openid();
    }

    public function get_openid() {
        //获取用户openid
        $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $_SESSION['access_token'];
        $str = get_url_contents($graph_url);
        if (strpos($str, 'callback') !== false) {
            $l = strpos($str, '(');
            $r = strpos($str, ')');
            $str = substr($str, $l + 1, $r - $l - 1);
            $user = json_decode($str);
            $_SESSION["openid"] = $user->openid;
        }
        $this->redirect('Index/index');
    }

    public function logout() {
        session_destroy();
        $_SESSION = array();
        $this->redirect(C('DEFAULT_MODULE').'/index');
    }

}

?>
