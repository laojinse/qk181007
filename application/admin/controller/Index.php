<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    // http://www.laomo.com/admin/index/index
    public function index()
    {
        return $this->fetch(); 
    }

    public function mk()
    {
        return 'mk';
    }
    
}
