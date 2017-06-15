<?php
namespace Home\Controller;
use Think\Controller;
// use Org\Net;
class IndexController extends Controller {
      //前置操作方法
    public function _before_index(){
        // echo 'before<br/>';
    }
    public function index(){
        $array['name']    =    'thinkphp';
        $array['email']    =    'liu21st@gmail.com';
        $array['phone']    =    '12335678';

        $this->assign('info' ,$array);
        $this->assign('name', 'chenlj');
        $this->display("Home@Index/index");
        // // phpinfo();
        // C('DB_NAME','thinkphp');
        // // print_r( C());
        // echo C('default_model',null,'detrg43565765');
        // \Think\Log::write('测试日志信息，这是警告级别，并且实时写入','WARN');
        // dump(array('436tdg' =>'fdgfdg' , ));
        // // \Home\Event\UserEvent::login();
        // // $ip =get_client_ip();
        // // $Ip = new \Org\Net\IpLocation(''); // 实例化类 参数表示IP地址库文件
        // // $area = $Ip->getlocation('120.24.255.95'); // 获取某个IP地址所在的位置
        // // var_dump($ip,$area);
        // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
     //后置操作方法
    public function _after_index(){
        // echo 'after<br/>';
    }
    public function test() {
        echo '4543tdfgfd';
    }
}
