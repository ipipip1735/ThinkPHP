<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/9
 * Time: 9:00
 */

namespace app\mine\controller;

use think\Controller;

class Ctrl extends Controller
{
    public function go()
    {
        return 'go';
    }

    public function act($one, $two)
    {
        return $one . ', ' . $two;
    }

    public function view()
    {
        $this->assign('name', "nnnnnnnn");
        return $this->fetch('view');//当前控制器视图
//        return $this->fetch('ctrl/view');//当前模块下ctrl控制器的view视图
//        return $this->fetch('ck/view');//当前模块/ck目录下的view视图
//        return $this->fetch('index@index/view');//index模块下index控制器的view视图
//        return $this->fetch('/menu');//当前模块视图根目录

//        return $this->filter(function ($content) {
//            echo $content;
//        })->fetch();
    }
}
