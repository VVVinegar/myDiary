<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable=['title','content'];

    /*
     * user关联，获取该日志的作者
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
