<?php
/**
 * Created by PhpStorm.
 * User: 759517209@qq.com
 * Date: 2017/4/21
 * Time: 20:36
 */

namespace App\Repositories;


use App\Diary;
use App\User;

class DiaryRepository
{
    /*
     * 获得用户所有日志
     */
    public function forUser(User $user){
        return Diary::where('user_id',$user->id)
            ->orderBy('created_at','desc')
            ->get();
    }
}