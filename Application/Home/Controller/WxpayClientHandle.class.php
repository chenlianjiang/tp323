<?php
namespace Home\Controller;
/**
 * 请求型接口的基类
 */
class WxpayClientHandle extends JsApiCommonController{
    public $params; //请求参数，类型为关联数组
    public $response; //微信返回的响应
    public $result; //返回参数，类型类关联数组
    public $url; //接口链接
    public $curl_timeout; //curl超时时间

    /**
     * 设置请求参数
     * @param [type] $param      [description]
     * @param [type] $paramValue [description]
     */
    public function setParam($param, $paramValue) {
        $this->params[$this->tirmString($param)] = $this->trimString($paramValue);
    }

    /**
     * 获取结果，默认不使用证书
     * @return [type] [description]
     */
    public function getResult() {
        $this->postxml();
        $this->result = $this->xmlToArray($this->response);

        return $this->result;
    }

    /**
     * post请求xml
     * @return [type] [description]
     */
    public function postxml() {
        $xml = $this->createXml();
        $this->response = $this->postXmlCurl($xml, $this->curl, $this->curl_timeout);

        return $this->response;
    }

    public function createXml() {
        $this->params['appid'] = C('APPID'); //公众号ID
        $this->params['mch_id'] = C('MCHID'); //商户号
        $this->params['nonce_str'] = $this->createNoncestr();   //随机字符串
        $this->params['sign'] = $this->getSign($this->params);  //签名

        return $this->arrayToXml($this->params);
    }



}
