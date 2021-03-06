<?php
/**
 * Created by PhpStorm.
 * User: sf
 * Date: 2018/2/22
 * Time: 11:35
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;
use think\Exception;
use think\Log;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getProOrder']
    ];

    //请求预订单的信息
    public function getPreOrder($id = '')
    {
        (new IDMustBePostiveInt())->goCheck();
        $pay = new PayService($id);
        return $pay->pay();
    }

    //微信回调
    public function receiveNotify()
    {
        //通知频率为15/15/30/180/1800/1800/1800/1800/3600，单位：秒

        //1. 检查库存量，超卖
        //2. 更新这个订单的status状态
        //3. 减库存
        // 如果成功处理，我们返回微信成功处理的信息。否则，我们需要返回没有成功处理。

        //特点：post；xml格式；不会携带参数
//        Log::('aaaaaaaaaaaaaaaaaaaaaa');
//        throw new Exception('asdfasdfasdfsdf');
        $notify = new WxNotify();
        $notify->Handle();

        $xmlData = file_get_contents('php://input');
        $result = curl_post_raw('http:/127.0.0.3/index.php/api/v1/pay/re_notify', $xmlData);
    }

    public function redirectNotify()
    {
        //通知频率为15/15/30/180/1800/1800/1800/1800/3600，单位：秒

        //1. 检查库存量，超卖
        //2. 更新这个订单的status状态
        //3. 减库存
        // 如果成功处理，我们返回微信成功处理的信息。否则，我们需要返回没有成功处理。
        //特点：post；xml格式；不会携带参数
        $notify = new WxNotify();
        $notify->Handle();
    }
}