<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//Route::get('think', function () {
//    return 'hello,ThinkPHP5!';
//});

//Route::get('hello/:name', 'index/hello');

//return [
//
//];

//Module mine
Route::get(':one/:two', 'mine/Ctrl/act')
    ->pattern(['one' => '\d+']);//变量检测

//Route::get('/:one/:two', 'mine/Ctrl/act')
//    ->ext('html');


//Route::get('/mine', 'https://www.baidu.com');


//分组
//Route::group('mine', [
//    'go' => 'mine/Ctrl/go',
//    ':one/:two'   => 'mine/Ctrl/act',
//]);

Route::get(':act', 'mine/Ctrl/:act');


