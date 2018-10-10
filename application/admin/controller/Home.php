<?php
namespace app\admin\controller;
use think\Controller;

class Home extends Controller 
{
    public function index()
    {
        return $this->fetch();
    }
    public function ab()
    {
        return '进来了';
    }
    
}
