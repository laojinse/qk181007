<?php
namespace app\admin\model;
use think\Model;

class Admins extends Model
{
    // public function getAddTimeAttr($addTime)
    // {
    //     return date('Y-m-d',$addTime);
    // }
    // // public function getGidAttr($gid)
    // // {
    // //     $where = function ($query){
    // //         $query->field(['gid','title'])
    // //         ->where('gid','>',0);
    // //     };
    // //     $status = AdminGroups::all($where);
        
    // //     $data =[];
    // //     foreach($status as $key=>$value){
    // //         $data[$value['gid']]=$value['title'];
    // //     }

    // //     return $data[$gid];
    // // }

    
    // public function getStatusAttr($value){
    //     $status = [0=>'正常',1=>'禁用',2=>'待审核'];
    //     return $status[$value];
    // }
}