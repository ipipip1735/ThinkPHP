<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/10
 * Time: 15:53
 */


namespace app\mine;


use think\Validate;

class UserValidate extends Validate
{

    protected $rule = [
        'name' => 'require|max:25',
        'email' => 'email',
    ];

    protected $message = [
        'name.require' => 'name is vacuum',
        'email' => 'is this your email?',
    ];

    public function sceneForm()
    {
        return $this->only(['name']);
//            ->append('name', 'min:5')
//            ->remove('age', 'between')
//            ->append('age', 'require|max:100');
    }

    /**
     * UserValidate constructor.
     */
    public function __construct()
    {
        echo "~~UserValidate~~";
    }
}