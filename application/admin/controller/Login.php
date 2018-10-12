<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\admin\model\Admins;

class Login extends Controller
{
    // 渲染后台登录页
    public function login()
    {
        return $this->fetch();
    }

    // 登录验证
    public function dologin(Request $request)
    {
        $username = $request -> post('username');   // 用户名
        $password = $request -> post('password');   // 原始密码
        $vercode = $request -> post('vercode');     // 验证码

        !$request->param('username') && (  exit( json($code=1,$msg='用户名不能为空')) );   
        !$request->param('password') && (  exit( json($code=1,$msg='密码不能为空')) ); 
        !$request->param('vercode') && (  exit( json($code=1,$msg='验证码不能为空')) );
        !captcha_check( $vercode ) && ( exit( json($code=1,$msg='验证码不正确')) );

        // 只根据用户名拿数据 注意 这个 use 
        $where = function ($query) use($username){
            $query->where([
                    'username' =>['=',$username],
                ]);
        };
        //在这有个坑点 返回值 只能是数组、字符串、不能反回一个对象
        $lmb = Admins::get($where);

        //登录用户验证
        !$lmb && exit( json(1,$msg='登录失败，该用户不存在'));
        // 登录用户密码验证
        MD5($password) !== $lmb->getData()['password'] && exit( json($code=1,$msg='登录失败，密码错误'));
        // 判断该用户是否被禁用
        $lmb->getData()['status']==1 && exit( json($code=1,'该用户已被管理员禁用')); 

        // 成功登陆 缓存用户登录信息 
        Session::set('admin',$lmb->getData());

        exit( json(0,'登陆成功等待跳转') ); 
    }
}
