<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/9
 * Time: 9:00
 */

namespace app\mine\controller;

use app\common\Person;
use app\mine\UserValidate;
use think\Controller;
use think\Db;
use think\facade\Log;
use think\facade\Session;

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

    public function cache()
    {

        $c = \cache('name');
        if (!$c) {
            $c = 'sam';
            \cache('name', $c, 10);
            echo 'save' . PHP_EOL;
        }

        return var_dump($c);
    }

    public function session()
    {
//        \session(null);//清除所有Session

        if (!\session('?name')) {
            session('name', 'bob');
            echo 'save session';
        }

        echo \session('name');
    }

    public function log()
    {
        Log::record('one');//保存到内存
        Log::record('two');//保存到内存
        Log::clear();//清空内存中所有日志
        Log::record('three');//保存到内存
        Log::save();//同步到磁盘，并清空内存中所有日志
        Log::record('four');//保存到内存
    }

    public function check()
    {

        //方法一：
//        $v = new UserValidate();
//        $r = $v->check([
//            'name' => 'aaaaaaaaaaaaaa',
//            'email' => 'aaaaaaaaaaaaaa',
//        ]);
//        if(!$r) dump($v->getError());

        //方式二：使用控制器的validate()方法
//        $result = $this->validate([
//            'name' => 'aaaaaaaaaaaaaa',
//            'email' => 'aaaaaaaaaaaaaa',
//        ], 'app\mine\UserValidate');
//
//        if(true !== $result) dump($result);

        //部分验证
        $v = new UserValidate();
        $r = $v->scene('form')->check([
            'name' => 'aaaaaaaaaaaaaa',
            'email' => 'aaaaaaaaaaaaaa',
        ]);
        if (!$r) dump($v->getError());
    }

    public function view()
    {
        $this->assign('name', "nnnnnnnn");
        return $this->fetch('inc');//模板包含
//        return $this->fetch('sub');//模板继承
//        return $this->fetch('content');//模板布局
//        return $this->fetch('view');//当前控制器视图
//        return $this->fetch('ctrl/view');//当前模块下ctrl控制器的view视图
//        return $this->fetch('ck/view');//当前模块/ck目录下的view视图
//        return $this->fetch('index@index/view');//index模块下index控制器的view视图
//        return $this->fetch('/menu');//当前模块视图根目录

//        return $this->filter(function ($content) {
//            echo $content;
//        })->fetch();
    }

    public function db()
    {
        //add
//        $data = [
//            'person_name' => 'jack' . time(),
//            'person_age' => rand(0, 120),
//            'person_sex' => false,
//        ];
//        Db::name('person')->insert($data);


        //query
//        $person = Db::name('person')
//            ->where('person_id', 1)
//            ->find();
        $person = Db::name('person')
            ->where('person_id', 1)
            ->value('person_id');//value和column是等价的
//            ->column('person_name');

        var_dump($person);

        //update
//        $person = Db::name('person')
//            ->where('person_id', 1)
//            ->update([
//                'person_age' => 1,
//                'person_sex' => true,
//            ]);
//
//        var_dump($person);

    }

    public function model()
    {
        //add
        $data = [
            'person_name' => 'jack' . time(),
//            'person_name' => ['one'=>111, 'two'=>222],
            'person_age' => rand(0, 120),
            'person_sex' => false,
        ];

        //方式一
        $person = new Person($data);
        $person->save();

        //方式二
//        $person = new Person;
////        $person->person_name=[
////            'one'=>111,
////            'two'=>222,
////        ];
//        $person->save($data);


        //query
//        $person = Person::get(1);//取出主键为1的数据
//        $person = Person::where('person_age', 84)->find();
//        var_dump($person->person_name->one);

        //update
//        $person = Person::get(1);//取出主键为1的数据
//        $person->person_age = 18;
//        $person->save();


    }


}
