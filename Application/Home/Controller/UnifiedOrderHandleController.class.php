<?php
namespace Home\Controller;
/**
 * 统一下单接口类
 */
class UnifiedOrder_handle extends WxpayClientHandle {
    public function __construct() {
        //设置接口链接
        $this->url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        //设置curl超时时间
        $this->curl_timeout = C('CURL_TIMEOUT');
    }

}
