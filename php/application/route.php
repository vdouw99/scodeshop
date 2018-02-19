<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]' => [
//        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//];

use think\Route;

/**
 * 获取指定ID的banner信息
 * http://127.0.0.3/index.php/api/v1/banner/1
 */
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
//Route::get('api/v1/banner/:id', 'api/v1.Banner/getBanner');

/*
 * 获取所有专题
 * http://127.0.0.3/index.php/api/v1/theme?ids=1,2,3
 */
Route::get('api/:version/theme', 'api/:version.Theme/getSimpleList');

/**
 * 获取单个专题
 */
Route::get('api/:version/theme/:id', 'api/:version.Theme/getComplexOne');

/**
 * 获取某分类下全部商品(不分页）
 * http://127.0.0.3/index.php/api/v1/product/by_category?id=3
 */
Route::get('api/:version/product/by_category', 'api/:version.Product/getAllInCategory');

/**
 * 商品详情
 * http://127.0.0.3/index.php/api/v1/product/11
 */
Route::get('api/:version/product/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);  //只匹配正整数

///**
// * 获取指定数量的最近商品
// * http://127.0.0.3/index.php/api/v1/product/recent/count/10
// */
//Route::get('api/:version/product/recent/count/:count', 'api/:version.Product/getRecent');

/**
 * 获取指定数量的最近商品
 * http://127.0.0.3/index.php/api/v1/product/recent?count=10
 */
Route::get('api/:version/product/recent', 'api/:version.Product/getRecent');

////路由分组
//Route::group('api/:version/product',function(){
//    Route::get('/by_category', 'api/:version.Product/getAllInCategory');
//    Route::get('/:id', 'api/:version.Product/getOne', [], ['id' => '\d+']);
//    Route::get('/recent', 'api/:version.Product/getRecent');
//});

/**
 * 获取全部分类
 * http://127.0.0.3/index.php/api/v1/category/all
 */
Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');

/**
 * 创建或更新地址 post
 * http://127.0.0.3/index.php/api/v1/address
 * headers: token=>ab08d14e99f0eeb541671d3c5f0ddf45
 * body: {"name":"qiyue1111","mobile":"13012345678","province":"中华大地","city":"成都","country":"武侯祠","detail":"狮王之傲旅店"}
 */
Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');

/**
 * 获取Token post
 * 小程序的调试工具中获取的
 */
Route::post('api/:version/token/user', 'api/:version.Token/getToken');

/**
 * 下单 post
 * http://127.0.0.3/index.php/api/v1/order
 * headers: token=>ab08d14e99f0eeb541671d3c5f0ddf45
 * body: { "products": [{ "product_id": 1, "count": 1 }, { "product_id": 2, "count": 1 }] }
 */
Route::post('api/:version/order', 'api/:version.Order/placeOrder');



//Route::rule('路由表达式', '路由地址', '请求类型', '路由参数（数组）', '变量规则（数组）');

//Route::rule('hello', 'sample/test/hello');
//Route::rule('hello', 'sample/test/hello', 'GET|POST', ['https' => false]);
//Route::post('hello', 'sample/test/hello');
//Route::any('hello', 'sample/test/hello');

Route::get('hello/:id', 'sample/test/hello');
Route::post('hello2', 'sample/test/hello2');