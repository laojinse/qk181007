<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    // http://www.laomo.com/index/index/abc
    public function index()
    {
        return $this->fetch();
        // return 'abc';
    }
    public function abc()
    {
        return 'abc';
    }
}
