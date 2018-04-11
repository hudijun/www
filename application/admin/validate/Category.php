<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule =[
        ['name','require|max:10','分类不能为空|字数不能超过10'],
        ['parent_id','number'],
        ['ID','number'],
        ['status','number|in:-1,0,1','状态必须是数字|状态范围不合法'],
        ['listorder','number'],
    ];

    protected $scene =[
        'add'=>['name','parent_id'],
        'listorder'=>['ID','listorder'],


    ];
}