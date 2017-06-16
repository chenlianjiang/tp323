<?php
namespace Home\Controller;
/**
 * 响应型接口基类
 */
class WxpayServerHandleController extends JsApiCommonController{
    public $data; //接收到的数据，类型为关联数组
    public $returnParams;   //返回参数，类型为关联数组

    /**
     * 将微信请求的xml转换成关联数组
     * @param  [type] $xml [description]
     * @return [type]      [description]
     */
    public function saveData($xml) {
        $this->data = $this->xmlToArray($xml);
    }


    /**
     * 验证签名
     * @return [type] [description]
     */
    public function checkSign() {
        $tmpData = $this->data;
        unset($temData['sign']);
        $sign = $this->getSign($tmpData);
        if ($this->data['sign'] == $sign) {
            return true;
        }
        return false;
    }

    /**
     * 设置返回微信的xml数据
     */
    function setReturnParameter($parameter, $parameterValue)
    {
        $this->returnParameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
    }

    /**
     * 将xml数据返回微信
     */
    function returnXml()
    {
        $returnXml = $this->createXml();
        return $returnXml;
    }

}

