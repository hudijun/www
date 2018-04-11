<?php

namespace app\admin\controller;

use think\Controller;

class Category extends Controller
{
    private $obj;
    public function _initialize(){
    	$this->obj=model('Category');
    }
    public function index()
    {
        $parentId = input('get.parent_id',0,'intval');
        $categorys=$this->obj->getFirstCategory($parentId);
        return $this->fetch('',['categorys'=>$categorys]);
    }

    public function add(){
    	$categorys =$this->obj->getNormalFirstCategory();

        return $this->fetch('',['categorys'=> $categorys]);
    }

    public function save(){

        //var_dump($_POST);
        //print_r($_POST);
        //print_r(input('post.'));
        //print_r(request()->post());
        $data = input('post.');
        $validate=validate('Category');
        if(!$validate->scene('add')->check($data)){

        	$this->error($validate->getError());

        }

        $res=$this->obj->add($data);

        echo $res;

    }

}