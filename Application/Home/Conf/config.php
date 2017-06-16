<?php
return array(
	//'配置项'=>'配置值'
   'SHOW_PAGE_TRACE' =>true,  //
   'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => '/Public', // 更改默认的/Public 替换规则
        '__JS__' => '/Public/JS/', // 增加新的JS类库路径替换规则
        '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
    ),

   /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '192.168.10.10', // 服务器地址
    'DB_NAME'               =>  'homestead',          // 数据库名
    'DB_USER'               =>  'homestead',      // 用户名
    'DB_PWD'                =>  'secret',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀

     //微信公众号身份的唯一标识。
     'APPID' => 'wx654a22c6423213b7',
    //受理商ID，身份标识
     'MCHID' => '10043241',
     'MCHNAME' => 'KellyCen的博客',

    //商户支付密钥Key。
     'KEY' => '0000000000000000000000000000000',
    //JSAPI接口中获取openid
     'APPSECRET' => '000000000000000000000000000',

    //证书路径,注意应该填写绝对路径
    'SSLCERT_PATH' => '/home/WxPayCacert/apiclient_cert.pem',
    'SSLKEY_PATH' => '/home/WxPayCacert/apiclient_key.pem',
    'SSLCA_PATH' => '/home/WxPayCacert/rootca.pem',

    //本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
    'CURL_TIMEOUT' => 30,
);
