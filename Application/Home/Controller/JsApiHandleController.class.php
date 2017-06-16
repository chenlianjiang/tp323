<?php
namespace Home\Controller;
/**
* JSAPI支付——H5网页端调起支付接口
*/
class JsApiHandleController extends JsApiCommonController {
    public $code;//code码，用以获取openid
    public $openid;//用户的openid
    public $parameters;//jsapi参数，格式为json
    public $prepay_id;//使用统一支付接口得到的预支付id
    public $curl_timeout;//curl超时时间

    function __construct()
    {
        parent::__construct();
        //设置curl超时时间
        $this->curl_timeout = C('CURL_TIMEOUT');
    }

    /**
     * 生成获取code的URL
     * @return [type] [description]
     */
    public function createOauthUrlForCode() {
        //重定向URL
        //createOauthUrl
        //http://120.24.255.95/tp323/index.php?s=/home/wxpay/index.html
        $redirectUrl = "http://120.24.255.95/tp323/index.php?s=/home/index/index.html?showwxpaytitle=1";
        $urlParams['appid'] = C('APPID');
        $urlParams['redirect_uri'] = $redirectUrl;
        $urlParams['response_type'] = 'code';
        $urlParams['scope'] = 'snsapi_base';
        $urlParams['state'] = "STATE"."#wechat_redirect";
        //拼接字符串
        $queryString = $this->ToUrlParams($urlParams, false);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?".$queryString;
    }

    /**
     * 设置code
     * @param [type] $code [description]
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     *  作用：设置prepay_id
     */
    public function setPrepayId($prepayId)
    {
        $this->prepay_id = $prepayId;
    }

    /**
     *  作用：获取jsapi的参数
     */
    public function getParams()
    {
        $jsApiObj["appId"] = C('APPID');
        $timeStamp = time();
        $jsApiObj["timeStamp"] = "$timeStamp";
        $jsApiObj["nonceStr"] = $this->createNoncestr();
        $jsApiObj["package"] = "prepay_id=$this->prepay_id";
        $jsApiObj["signType"] = "MD5";
        $jsApiObj["paySign"] = $this->getSign($jsApiObj);
        $this->parameters = json_encode($jsApiObj);

        return $this->parameters;
    }

    /**
     * 通过curl 向微信提交code 用以获取openid
     * @return [type] [description]
     */
    public function getOpenId() {
        //创建openid 的链接
        $url = $this->createOauthUrlForOpenid();
        //初始化
        $ch = curl_init();
        curl_setopt($ch, CURL_TIMEOUT, $this->curl_timeout);
        curl_setopt($ch, CURL_URL, $url);
        curl_setopt($ch, CURL_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURL_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURL_HEADER, FALSE);
        curl_setopt($ch, CURL_RETURNTRANSFER, TRUE);
        //执行curl
        $res = curl_exec($ch);
        curl_close($ch);
        //取出openid
        $data = json_decode($res);
        if (isset($data['openid'])) {
            $this->openid = $data['openid'];
        } else {
            return null;
        }

        return $this->openid;

    }

    /**
     * 生成可以获取openid 的URL
     * @return [type] [description]
     */
    public function createOauthUrlForOpenid() {
        $urlParams['appid'] = C('APPID');
        $urlParams['secret'] = C('APPSECRET');
        $urlParams['code'] = $this->code;
        $urlParams['grant_type'] = "authorization_code";
        $queryString = $this->ToUrlParams($urlParams, false);
        return "https://api.weixin.qq.com/sns/oauth2/access_token?".$queryString;
    }
}
